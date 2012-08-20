<?php

	header( 'Content-Type: text/html; charset=utf-8' );
	include_once '../application/config/includes.inc.php';

	$controller = new WowController();
	$controller->main();

	class WowController
	{

		private $template;
		private $request;
		private $db;

		public function __construct ()
		{
			$this->template = new Smarty_Extended();
			$this->request  = $_REQUEST;
			$this->db       = DatabaseConnection::get()->handle();
		}

		public function main ()
		{
			$optTela = isset( $this->request[ "optTela" ] ) ? $this->request[ "optTela" ] : "";
			switch ( $optTela )
			{
				case 'updateDatabase'    :
				default                    :
					echo $this->updateDatabaseAction();
			}
		}

		private function updateDatabaseAction ()
		{
			try
			{
				$this->db->beginTransaction();

				$wowDatabase = new WowDatabase();

				$wowDatabase->updateRaces();

				$wowDatabase->updateClasses();

				$memberDao = new MemberDao();
				$members   = $memberDao->getList();
				foreach ( $members as $member )
				{
					$character = $wowDatabase->updateCharacter( $member->getRealm(), $member->getName() );
					//$wowDatabase->updateFeeds($character);
					$member->setCharacter( $character->getId() );
					$memberDao->save( $member );
				}

				$this->db->commit();
				//Utils::dump("COMMIT");
				$this->template->assign( "error", array( FALSE, "Base da dados atualizada!" ) );
			} catch ( PDOException $e )
			{
				$this->db->rollBack();
				//Utils::dump("ROLLBACK");
				$this->template->assign( "error", array( TRUE, $e->getMessage() ) );
			}

			return $this->template->fetch( VIEW_DIR . "/wow/updateDatabase.phtml" );
		}

		/**
		$fooClass = new ReflectionClass ( 'CharacterDao' );
		$constants = $fooClass->getConstants();
		Utils::dump($constants);
		die();
		 */

	}