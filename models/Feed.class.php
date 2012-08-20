<?php

	class Feed
	{

		private $id;
		private $character;
		private $timestamp;
		private $type;
		private $typeValue;
		private $details;

		public function __construct ()
		{

		}

		public function convertJsonToObject ( $data )
		{
			//$this->setCharacter	($data->character);
			$this->setType( $data->type );
			$this->setTimestamp( date( 'd/m/Y h:i:s', substr( $data->timestamp, 0, 10 ) ) );

			switch ( $data->type )
			{
				case "ACHIEVEMENT"    :
					$this->setTypeValue( $data->achievement->id );
					break;
				case "CRITERIA"     :
					$this->setTypeValue( $data->achievement->id );
					break;
				case "BOSSKILL"        :
					$this->setTypeValue( $data->achievement->id );
					break;
				case "LOOT"            :
					$this->setTypeValue( $data->itemId );
					break;
			}
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
		 * Setter: timestamp
		 *
		 * @param String $timestamp
		 *
		 * @return void
		 */
		public function setTimestamp ( $timestamp )
		{
			$this->timestamp = $timestamp;
		}

		/**
		 * Setter: type
		 *
		 * @param String $type
		 *
		 * @return void
		 */
		public function setType ( $type )
		{
			$this->type = $type;
		}

		/**
		 * Setter: typeValue
		 *
		 * @param String $typeValue
		 *
		 * @return void
		 */
		public function setTypeValue ( $typeValue )
		{
			$this->typeValue = $typeValue;
		}

		/**
		 * Setter: details
		 *
		 * @param String $details
		 *
		 * @return void
		 */
		public function setDetails ( $details )
		{
			$this->details = $details;
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
		 * Getter: character
		 *
		 * @return String
		 */
		public function getCharacter ()
		{
			return $this->character;
		}

		/**
		 * Getter: timestamp
		 *
		 * @return String
		 */
		public function getTimestamp ()
		{
			return $this->timestamp;
		}

		/**
		 * Getter: type
		 *
		 * @return String
		 */
		public function getType ()
		{
			return $this->type;
		}

		/**
		 * Getter: typeValue
		 *
		 * @return String
		 */
		public function getTypeValue ()
		{
			return $this->typeValue;
		}

		/**
		 * Getter: details
		 *
		 * @return String
		 */
		public function getDetails ()
		{
			return $this->details;
		}

	}