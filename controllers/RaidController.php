<?php

	header( 'Content-Type: text/html; charset=utf-8' );
	include_once '../application/config/includes.inc.php';

	$controller = new RaidController();
	$controller->main();

	class RaidController
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
			$optTela = isset( $this->request[ "optTela" ] ) && !empty( $this->request[ "optTela" ] ) ? $this->request[ "optTela" ] : NULL;
			switch ( $optTela )
			{
				case 'list'    :
				default        :
					echo $this->listAction();
			}
		}

		private function listAction ()
		{

			//isset($var) && !empty($var) ? $var : $default;

			$orderBy            = isset( $this->request[ "orderBy" ] ) && !empty( $this->request[ "orderBy" ] ) ? $this->request[ "orderBy" ] : NULL;
			$orderBy[ "field" ] = isset( $orderBy[ "field" ] ) && !empty( $orderBy[ "field" ] ) ? $orderBy[ "field" ] : "name";
			$orderBy[ "sort" ]  = isset( $orderBy[ "sort" ] ) && !empty( $orderBy[ "sort" ] ) ? $orderBy[ "sort" ] : "Asc";
			$filters            = isset( $this->request[ "filters" ] ) && !empty( $this->request[ "filters" ] ) ? $this->request[ "filters" ] : NULL;
			$filterBy           = isset( $this->request[ "filterBy" ] ) && !empty( $this->request[ "filterBy" ] ) ? $this->request[ "filterBy" ] : NULL;
			$memberDao          = new MemberDao();
			$memberList         = $memberDao->getList( $filterBy, $orderBy );

			$this->template->assign( "memberList", $memberList );
			$this->template->assign( "orderBy", $orderBy );
			$this->template->assign( "filterBy", $filterBy );
			$this->template->assign( "filters", $filters );

			return $this->template->fetch( VIEW_DIR . "/raid/listaMembros.phtml" );
		}

	}
