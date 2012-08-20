<?php

	Class MemberDao extends Dao implements iDao
	{

		const TABLE_NAME      = 'raid.members';
		const FIELD_ID        = 'id';
		const FIELD_NAME      = 'name';
		const FIELD_REALM     = 'realm';
		const FIELD_CHARACTER = 'character';

		public function objectBuilder ( $row )
		{
			$object = new Member();
			$object->setId( $row[ self::FIELD_ID ] );
			$object->setName( $row[ self::FIELD_NAME ] );
			$object->setRealm( $row[ self::FIELD_REALM ] );
			$object->setCharacter( $row[ self::FIELD_CHARACTER ] );
			return $object;
		}

		public static function getList ( $filterBy = array(), $orderBy = array() )
		{
			$orderByField = $orderBy[ "field" ] ? $orderBy[ "field" ] : self::FIELD_NAME;
			$orderBySort  = $orderBy[ "sort" ] ? $orderBy[ "sort" ] : "Asc";

			switch ( $orderByField )
			{
				case 'name':
					$orderByField = "wow.characters.name";
					break;
				case 'spec':
					$orderByField = "wow.characters.spec1";
					break;
				case 'class':
					$orderByField = "wow.classes.name";
					break;
				case 'guild':
					$orderByField = "wow.characters.guild";
					break;
				default:
					$orderByField = "wow.characters.name";
			}

			$whereList = array();
			if ( !empty( $filterBy ) )
			{
				foreach ( $filterBy as $key => $value )
				{
					switch ( $key )
					{
						case 'name':
							$filterByField = "wow.characters.name";
							break;
						case 'spec':
							$filterByField = "wow.characters.spec1";
							break;
						case 'class':
							$filterByField = "wow.classes.name";
							break;
						case 'guild':
							$filterByField = "wow.characters.guild";
							break;
					}
					if ( $value )
					{
						$whereList[ ] = "$filterByField = '$value'";
					}
				}
			}
			$filters = ( !empty( $whereList ) ? " WHERE " . implode( $whereList, " AND " ) : "" );
			$stmt    = DatabaseConnection::get()->handle()->prepare( "SELECT raid.members.*
			   FROM raid.members
			   JOIN wow.characters	ON wow.characters.id	= raid.members.character
			   JOIN wow.classes		ON wow.classes.id		= wow.characters.class
					$filters
		   ORDER BY $orderByField $orderBySort;" );
			$stmt->execute();
			$rows       = $stmt->fetchAll( PDO::FETCH_ASSOC );
			$objectList = array();
			foreach ( $rows as $row )
			{
				$objectList[ ] = self::objectBuilder( $row );
			}
			return !empty( $objectList ) ? $objectList : NULL;
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
				$this->insert( $object );
			}
			else
			{
				$object->setId( $exists->getId() );
				$this->update( $object );
			}
		}

		public function insert ( Character $object )
		{
			$sql  = "INSERT INTO " . self::TABLE_NAME . " (" . self::FIELD_NAME . "," . self::FIELD_REALM . "," . self::FIELD_CHARACTER . ") " . "VALUES (:name,:realm,:character)";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":name", $object->getName(), PDO::PARAM_STR );
			$stmt->bindParam( ":realm", $object->getRealm(), PDO::PARAM_STR );
			$stmt->bindParam( ":character", $object->getCharacter(), PDO::PARAM_INT );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Membro cadastrado com sucesso!' : 'Falha ao tentar cadastrar Membro';
		}

		public function update ( $object )
		{
			$sql  = "UPDATE " . self::TABLE_NAME . " " . "SET " . self::FIELD_NAME . " = :name, " . self::FIELD_REALM . " = :realm, " . self::FIELD_CHARACTER . " = :character " . "WHERE " . self::FIELD_ID . " = :id;";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":name", $object->getName(), PDO::PARAM_STR );
			$stmt->bindParam( ":realm", $object->getRealm(), PDO::PARAM_STR );
			$stmt->bindParam( ":character", $object->getCharacter(), PDO::PARAM_INT );
			$stmt->bindParam( ":id", $object->getId(), PDO::PARAM_INT );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Character atualizado com sucesso!' : 'Falha ao tentar atualizar Character';
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