<?php

	class Member
	{

		private $id;
		private $name;
		private $realm;
		private $character;

		public function __construct ()
		{

		}

		/**
		 * Setter: id
		 *
		 * @param String $id
		 *
		 * @return void
		 */
		public function setId ( $id )
		{
			$this->id = $id;
		}

		/**
		 * Setter: name
		 *
		 * @param String $name
		 *
		 * @return void
		 */
		public function setName ( $name )
		{
			$this->name = $name;
		}

		/**
		 * Setter: realm
		 *
		 * @param String $realm
		 *
		 * @return void
		 */
		public function setRealm ( $realm )
		{
			$this->realm = $realm;
		}

		/**
		 * Setter: character
		 *
		 * @param String $character
		 *
		 * @return void
		 */
		public function setCharacter ( $character )
		{
			$this->character = $character;
		}

		/**
		 * Getter: id
		 *
		 * @return String
		 */
		public function getId ()
		{
			return $this->id;
		}

		/**
		 * Getter: name
		 *
		 * @return String
		 */
		public function getName ()
		{
			return $this->name;
		}

		/**
		 * Getter: realm
		 *
		 * @return String
		 */
		public function getRealm ()
		{
			return $this->realm;
		}

		/**
		 * Getter: character
		 *
		 * @return String
		 */
		public function getCharacter ( $returnObject = FALSE )
		{
			if ( !$returnObject )
			{
				return $this->character;
			}
			else
			{
				$characterDao = new CharacterDao();
				return $characterDao->findById( $this->character );
			}
		}

	}