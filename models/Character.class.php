<?php

	class Character
	{

		private $id;
		private $lastmodified;
		private $name;
		private $realm;
		private $battleground;
		private $class;
		private $race;
		private $gender;
		private $level;
		private $achievementpoints;
		private $thumbnail;
		private $guild;
		private $spec1;
		private $spec2;

		public function __construct ()
		{

		}

		public function convertJsonToObject ( $data )
		{
			$this->setLastmodified( date( 'd/m/Y h:i:s', substr( $data->lastModified, 0, 10 ) ) );
			$this->setName( $data->name );
			$this->setRealm( $data->realm );
			$this->setBattleground( $data->battlegroup );
			$this->setClass( $data->class );
			$this->setRace( $data->race );
			$this->setGender( $data->gender );
			$this->setLevel( $data->level );
			$this->setaChievementpoints( $data->achievementPoints );
			$this->setThumbnail( $data->thumbnail );
			$this->setGuild( $data->guild->name );
			$this->setSpec1( isset( $data->talents[ 0 ] ) && !empty( $data->talents[ 0 ] ) ? $data->talents[ 0 ]->name : NULL );
			$this->setSpec2( isset( $data->talents[ 1 ] ) && !empty( $data->talents[ 1 ] ) ? $data->talents[ 1 ]->name : NULL );
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
		 * Setter: lastmodified
		 *
		 * @param String $lastmodified
		 *
		 * @return void
		 */
		public function setLastmodified ( $lastmodified )
		{
			$this->lastmodified = $lastmodified;
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
		 * Setter: battleground
		 *
		 * @param String $battleground
		 *
		 * @return void
		 */
		public function setBattleground ( $battleground )
		{
			$this->battleground = $battleground;
		}

		/**
		 * Setter: class
		 *
		 * @param String $class
		 *
		 * @return void
		 */
		public function setClass ( $class )
		{
			$this->class = $class;
		}

		/**
		 * Setter: race
		 *
		 * @param String $race
		 *
		 * @return void
		 */
		public function setRace ( $race )
		{
			$this->race = $race;
		}

		/**
		 * Setter: gender
		 *
		 * @param String $gender
		 *
		 * @return void
		 */
		public function setGender ( $gender )
		{
			$this->gender = $gender;
		}

		/**
		 * Setter: level
		 *
		 * @param String $level
		 *
		 * @return void
		 */
		public function setLevel ( $level )
		{
			$this->level = $level;
		}

		/**
		 * Setter: achievementpoints
		 *
		 * @param String $achievementpoints
		 *
		 * @return void
		 */
		public function setAchievementpoints ( $achievementpoints )
		{
			$this->achievementpoints = $achievementpoints;
		}

		/**
		 * Setter: thumbnail
		 *
		 * @param String $thumbnail
		 *
		 * @return void
		 */
		public function setThumbnail ( $thumbnail )
		{
			$this->thumbnail = $thumbnail;
		}

		/**
		 * Setter: guild
		 *
		 * @param String $guild
		 *
		 * @return void
		 */
		public function setGuild ( $guild )
		{
			$this->guild = $guild;
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
		 * Getter: lastmodified
		 *
		 * @return String
		 */
		public function getLastmodified ()
		{
			return $this->lastmodified;
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
		 * Getter: battleground
		 *
		 * @return String
		 */
		public function getBattleground ()
		{
			return $this->battleground;
		}

		/**
		 * Getter: class
		 *
		 * @param bool $returnObject
		 *
		 * @return String
		 */
		public function getClass ( $returnObject = FALSE )
		{
			if ( !$returnObject )
			{
				return $this->class;
			}
			else
			{
				$classDao = new ClassDao();
				return $classDao->findById( $this->class );
			}
		}

		/**
		 * Getter: race
		 *
		 * @return String
		 */
		public function getRace ()
		{
			return $this->race;
		}

		/**
		 * Getter: gender
		 *
		 * @return String
		 */
		public function getGender ()
		{
			return $this->gender;
		}

		/**
		 * Getter: level
		 *
		 * @return String
		 */
		public function getLevel ()
		{
			return $this->level;
		}

		/**
		 * Getter: achievementpoints
		 *
		 * @return String
		 */
		public function getAchievementpoints ()
		{
			return $this->achievementpoints;
		}

		/**
		 * Getter: thumbnail
		 *
		 * @return String
		 */
		public function getThumbnail ()
		{
			return $this->thumbnail;
		}

		/**
		 * Getter: guild
		 *
		 * @return String
		 */
		public function getGuild ()
		{
			return $this->guild;
		}

		/**
		 * Setter: spec1
		 *
		 * @param String $spec1
		 *
		 * @return void
		 */
		public function setSpec1 ( $spec1 )
		{
			$this->spec1 = $spec1;
		}

		/**
		 * Setter: spec2
		 *
		 * @param String $spec2
		 *
		 * @return void
		 */
		public function setSpec2 ( $spec2 )
		{
			$this->spec2 = $spec2;
		}

		/**
		 * Getter: spec1
		 *
		 * @return String
		 */
		public function getSpec1 ()
		{
			return $this->spec1;
		}

		/**
		 * Getter: spec2
		 *
		 * @return String
		 */
		public function getSpec2 ()
		{
			return $this->spec2;
		}

	}