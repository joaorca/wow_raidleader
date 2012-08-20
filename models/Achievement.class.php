<?php

	class Achievement
	{

		private $id;
		private $title;
		private $description;

		public function __construct ()
		{

		}

		public function convertJsonToObject ( $data )
		{
			$this->setId( $data->id );
			$this->setTitle( $data->title );
			$this->setDescription( $data->description );

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
		 * Setter: title
		 *
		 * @param String $title
		 *
		 * @return void
		 */
		public function setTitle ( $title )
		{
			$this->title = $title;
		}

		/**
		 * Setter: description
		 *
		 * @param String $description
		 *
		 * @return void
		 */
		public function setDescription ( $description )
		{
			$this->description = $description;
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
		 * Getter: title
		 *
		 * @return String
		 */
		public function getTitle ()
		{
			return $this->title;
		}

		/**
		 * Getter: description
		 *
		 * @return String
		 */
		public function getDescription ()
		{
			return $this->description;
		}

	}