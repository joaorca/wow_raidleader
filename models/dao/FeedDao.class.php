<?php

	Class FeedDao extends Dao implements iDao
	{

		const TABLE_NAME      = 'wow.feeds';
		const FIELD_ID        = 'id';
		const FIELD_CHARACTER = 'character';
		const FIELD_TIMESTAMP = 'timestamp';
		const FIELD_TYPE      = 'type';
		const FIELD_TYPEVALUE = 'typevalue';
		const FIELD_DETAILS   = 'details';

		public function objectBuilder ( $row )
		{
			$object = new Feed();
			$object->setId( $row[ self::FIELD_ID ] );
			$object->setCharacter( $row[ self::FIELD_CHARACTER ] );
			$object->setTimestamp( $row[ self::FIELD_TIMESTAMP ] );
			$object->setType( $row[ self::FIELD_TYPE ] );
			$object->setTypeValue( $row[ self::FIELD_TYPEVALUE ] );
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
			$exists = $this->findByCharacterAndTypeAndTypeValueAndTimestamp( $object->getCharacter(), $object->getType(), $object->getTypeValue(), $object->getTimestamp() );
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

		public function insert ( $object )
		{
			$sql  = "INSERT INTO " . self::TABLE_NAME . " (" . self::FIELD_CHARACTER . "," . self::FIELD_TIMESTAMP . "," . self::FIELD_TYPE . "," . self::FIELD_TYPEVALUE . "," . self::FIELD_DETAILS . ")
				 VALUES (:character,:timestamp,:type,:typevalue,:details)";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":character", $object->getCharacter(), PDO::PARAM_INT );
			$stmt->bindParam( ":timestamp", $object->getTimestamp(), PDO::PARAM_STR );
			$stmt->bindParam( ":type", $object->getType(), PDO::PARAM_STR );
			$stmt->bindParam( ":typevalue", $object->getTypeValue(), PDO::PARAM_INT );
			$stmt->bindParam( ":details", $object->getDetails(), PDO::PARAM_STR );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Feed cadastrado com sucesso!' : 'Falha ao tentar cadastrar Feed';
		}

		public function update ( $object )
		{
			$sql  = "UPDATE " . self::TABLE_NAME . " " . "SET " . self::FIELD_CHARACTER . " = :character, " . self::FIELD_TIMESTAMP . " = :timestamp, " . self::FIELD_TYPE . " = :type, " . self::FIELD_TYPEVALUE . " = :typevalue ," . self::FIELD_DETAILS . " = :details " . "WHERE " . self::FIELD_ID . " = :id;";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":id", $object->getId(), PDO::PARAM_INT );
			$stmt->bindParam( ":character", $object->getCharacter(), PDO::PARAM_INT );
			$stmt->bindParam( ":timestamp", $object->getTimestamp(), PDO::PARAM_STR );
			$stmt->bindParam( ":type", $object->getType(), PDO::PARAM_STR );
			$stmt->bindParam( ":typevalue", $object->getTypeValue(), PDO::PARAM_INT );
			$stmt->bindParam( ":details", $object->getDetails(), PDO::PARAM_STR );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Feed atualizado com sucesso!' : 'Falha ao tentar atualizar Feed';
		}

		public function findByCharacterAndTypeAndTypeValueAndTimestamp ( $character, $type, $typeValue, $timestamp )
		{
			$stmt = $this->db->prepare( "SELECT * FROM " . self::TABLE_NAME . " WHERE " . self::FIELD_CHARACTER . " = ? AND " . self::FIELD_TYPE . " = ? AND " . self::FIELD_TYPEVALUE . " = ? AND " . self::FIELD_TIMESTAMP . " = ?;" );
			$stmt->bindParam( 1, $character, PDO::PARAM_INT );
			$stmt->bindParam( 2, $type, PDO::PARAM_STR );
			$stmt->bindParam( 3, $typeValue, PDO::PARAM_INT );
			$stmt->bindParam( 4, $timestamp, PDO::PARAM_STR );
			$stmt->execute();
			$row = $stmt->fetch( PDO::FETCH_ASSOC );
			return !empty( $row ) ? $this->objectBuilder( $row ) : NULL;
		}

	}