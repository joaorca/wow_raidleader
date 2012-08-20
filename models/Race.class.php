<?php

	class Race
	{

		private $id;
		private $mask;
		private $side;
		private $name;

		public function __construct ()
		{

		}

		public function convertJsonToObject ( $data )
		{
			$this->setId( $data->id );
			$this->setMask( $data->mask );
			$this->setSide( $data->side );
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
		 * Setter: side
		 *
		 * @param String $side
		 *
		 * @return void
		 */
		public function setSide ( $side )
		{
			$this->side = $side;
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
		 * Getter: side
		 *
		 * @return String
		 */
		public function getSide ()
		{
			return $this->side;
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