<?php

	class Classs
	{

		private $id;
		private $mask;
		private $powerType;
		private $name;

		public function __construct ()
		{

		}

		public function convertJsonToObject ( $data )
		{
			$this->setId( $data->id );
			$this->setMask( $data->mask );
			$this->setPowerType( $data->powerType );
			$this->setName( $data->name );
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
		 * Setter: mask
		 *
		 * @param String $mask
		 *
		 * @return void
		 */
		public function setMask ( $mask )
		{
			$this->mask = $mask;
		}

		/**
		 * Setter: powerType
		 *
		 * @param String $powerType
		 *
		 * @return void
		 */
		public function setPowerType ( $powerType )
		{
			$this->powerType = $powerType;
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
		 * Getter: id
		 *
		 * @return String
		 */
		public function getId ()
		{
			return $this->id;
		}

		/**
		 * Getter: mask
		 *
		 * @return String
		 */
		public function getMask ()
		{
			return $this->mask;
		}

		/**
		 * Getter: powerType
		 *
		 * @return String
		 */
		public function getPowerType ()
		{
			return $this->powerType;
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

	}