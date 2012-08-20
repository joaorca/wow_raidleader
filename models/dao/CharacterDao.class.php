<?php

	Class CharacterDao extends Dao implements iDao
	{

		const TABLE_NAME              = 'wow.characters';
		const FIELD_ID                = 'id';
		const FIELD_LASTMODIFIED      = 'lastmodified';
		const FIELD_NAME              = 'name';
		const FIELD_REALM             = 'realm';
		const FIELD_BATTLEGROUND      = 'battleground';
		const FIELD_CLASS             = 'class';
		const FIELD_RACE              = 'race';
		const FIELD_GENDER            = 'gender';
		const FIELD_LEVEL             = 'level';
		const FIELD_ACHIEVEMENTPOINTS = 'achievementpoints';
		const FIELD_THUMBNAIL         = 'thumbnail';
		const FIELD_GUILD             = 'guild';
		const FIELD_SPEC1             = 'spec1';
		const FIELD_SPEC2             = 'spec2';

		public function objectBuilder ( $row )
		{
			$object = new Character();
			$object->setId( $row[ self::FIELD_ID ] );
			$object->setLastmodified( $row[ self::FIELD_LASTMODIFIED ] );
			$object->setName( $row[ self::FIELD_NAME ] );
			$object->setRealm( $row[ self::FIELD_REALM ] );
			$object->setBattleground( $row[ self::FIELD_BATTLEGROUND ] );
			$object->setClass( $row[ self::FIELD_CLASS ] );
			$object->setRace( $row[ self::FIELD_RACE ] );
			$object->setGender( $row[ self::FIELD_GENDER ] );
			$object->setLevel( $row[ self::FIELD_LEVEL ] );
			$object->setaChievementpoints( $row[ self::FIELD_ACHIEVEMENTPOINTS ] );
			$object->setThumbnail( $row[ self::FIELD_THUMBNAIL ] );
			$object->setGuild( $row[ self::FIELD_GUILD ] );
			$object->setSpec1( $row[ self::FIELD_SPEC1 ] );
			$object->setSpec2( $row[ self::FIELD_SPEC2 ] );
			return $object;
		}

		public function findById ( $id )
		{
			$stmt = $this->db->prepare( "SELECT * FROM " . self::TABLE_NAME . " WHERE " . self::FIELD_ID . " = ?;" );
			$stmt->bindParam( 1, $id, PDO::PARAM_INT );
			$stmt->execute();
			$row = $stmt->fetch( PDO::FETCH_ASSOC );
			return !empty( $row ) ? $this->objectBuilder( $row ) : NULL;
		}

		public function save ( $object )
		{
			$exists = $this->findByRealmAndName( $object->getRealm(), $object->getName() );
			if ( empty( $exists ) )
			{
				return $this->insert( $object );
			}
			else
			{
				$object->setId( $exists->getId() );
				return $this->update( $object );
			}
		}

		public function insert ( Character $object )
		{
			$sql  = "INSERT INTO " . self::TABLE_NAME . " (" . self::FIELD_LASTMODIFIED . "," . self::FIELD_NAME . "," . self::FIELD_REALM . "," . self::FIELD_BATTLEGROUND . "," . self::FIELD_CLASS . "," . self::FIELD_RACE . "," . self::FIELD_GENDER . "," . self::FIELD_LEVEL . "," . self::FIELD_ACHIEVEMENTPOINTS . "," . self::FIELD_THUMBNAIL . "," . self::FIELD_GUILD . "," . self::FIELD_SPEC1 . "," . self::FIELD_SPEC2 . ") " . "VALUES (:lastModified,:name,:realm,:battleground,:class,:race,:gender,:level,
				:achievementpoints,:thumbnail,:guild,:spec1,:spec2)";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":lastModified", $object->getLastmodified(), PDO::PARAM_STR );
			$stmt->bindParam( ":name", $object->getName(), PDO::PARAM_STR );
			$stmt->bindParam( ":realm", $object->getRealm(), PDO::PARAM_STR );
			$stmt->bindParam( ":battleground", $object->getBattleground(), PDO::PARAM_STR );
			$stmt->bindParam( ":class", $object->getClass(), PDO::PARAM_STR );
			$stmt->bindParam( ":race", $object->getRace(), PDO::PARAM_STR );
			$stmt->bindParam( ":gender", $object->getGender(), PDO::PARAM_STR );
			$stmt->bindParam( ":level", $object->getLevel(), PDO::PARAM_STR );
			$stmt->bindParam( ":achievementpoints", $object->getAchievementpoints(), PDO::PARAM_STR );
			$stmt->bindParam( ":thumbnail", $object->getThumbnail(), PDO::PARAM_STR );
			$stmt->bindParam( ":guild", $object->getGuild(), PDO::PARAM_STR );
			$stmt->bindParam( ":spec1", $object->getSpec1(), PDO::PARAM_STR );
			$stmt->bindParam( ":spec2", $object->getSpec2(), PDO::PARAM_STR );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Character cadastrado com sucesso!' : 'Falha ao tentar cadastrar Character';
			$object->setId( $this->db->lastInsertId( self::TABLE_NAME . "_id_seq" ) );
			return $object;
		}

		public function update ( Character $object )
		{
			$sql  = "UPDATE " . self::TABLE_NAME . " " . "SET " . self::FIELD_LASTMODIFIED . " = :lastModified, " . self::FIELD_NAME . " = :name, " . self::FIELD_REALM . " = :realm, " . self::FIELD_BATTLEGROUND . " = :battleground, " . self::FIELD_CLASS . " = :class, " . self::FIELD_RACE . " = :race, " . self::FIELD_GENDER . " = :gender, " . self::FIELD_LEVEL . " = :level, " . self::FIELD_ACHIEVEMENTPOINTS . " = :achievementpoints, " . self::FIELD_THUMBNAIL . " = :thumbnail, " . self::FIELD_GUILD . " = :guild, " . self::FIELD_SPEC1 . " = :spec1, " . self::FIELD_SPEC2 . " = :spec2 " . "WHERE " . self::FIELD_ID . " = :id;";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":lastModified", $object->getLastmodified(), PDO::PARAM_STR );
			$stmt->bindParam( ":name", $object->getName(), PDO::PARAM_STR );
			$stmt->bindParam( ":realm", $object->getRealm(), PDO::PARAM_STR );
			$stmt->bindParam( ":battleground", $object->getBattleground(), PDO::PARAM_STR );
			$stmt->bindParam( ":class", $object->getClass(), PDO::PARAM_STR );
			$stmt->bindParam( ":race", $object->getRace(), PDO::PARAM_STR );
			$stmt->bindParam( ":gender", $object->getGender(), PDO::PARAM_STR );
			$stmt->bindParam( ":level", $object->getLevel(), PDO::PARAM_STR );
			$stmt->bindParam( ":achievementpoints", $object->getAchievementpoints(), PDO::PARAM_STR );
			$stmt->bindParam( ":thumbnail", $object->getThumbnail(), PDO::PARAM_STR );
			$stmt->bindParam( ":guild", $object->getGuild(), PDO::PARAM_STR );
			$stmt->bindParam( ":spec1", $object->getSpec1(), PDO::PARAM_STR );
			$stmt->bindParam( ":spec2", $object->getSpec2(), PDO::PARAM_STR );
			$stmt->bindParam( ":id", $object->getId(), PDO::PARAM_INT );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Character atualizado com sucesso!' : 'Falha ao tentar atualizar Character';
			return $object;
		}

		public function findByRealmAndName ( $realm, $name )
		{
			$stmt = $this->db->prepare( "SELECT * FROM " . self::TABLE_NAME . " WHERE " . self::FIELD_NAME . " = ? AND " . self::FIELD_REALM . " = ?;" );
			$stmt->bindParam( 1, $name, PDO::PARAM_STR );
			$stmt->bindParam( 2, $realm, PDO::PARAM_STR );
			$stmt->execute();
			$row = $stmt->fetch( PDO::FETCH_ASSOC );
			return !empty( $row ) ? $this->objectBuilder( $row ) : NULL;
		}

	}