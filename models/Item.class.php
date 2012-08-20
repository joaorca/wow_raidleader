<?php

	class Item
	{

		private $id;
		private $name;
		private $quality;

		public function __construct ()
		{

		}

		public function convertJsonToObject ( $data )
		{
			$this->setId( $data->id );
			$this->setName( $data->name );
			$this->setQuality( $data->quality );

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
		 * Setter: quality
		 *
		 * @param String $quality
		 *
		 * @return void
		 */
		public function setQuality ( $quality )
		{
			$this->quality = $quality;
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
		 * Getter: quality
		 *
		 * @return String
		 */
		public function getQuality ()
		{
			return $this->quality;
		}

	}