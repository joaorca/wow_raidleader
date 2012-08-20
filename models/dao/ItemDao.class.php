<?php

	Class ItemDao extends Dao implements iDao
	{

		const TABLE_NAME    = 'wow.items';
		const FIELD_ID      = 'id';
		const FIELD_NAME    = 'name';
		const FIELD_QUALITY = 'quality';

		public function objectBuilder ( $row )
		{
			$object = new Item();
			$object->setId( $row[ self::FIELD_ID ] );
			$object->setName( $row[ self::FIELD_NAME ] );
			$object->setQuality( $row[ self::FIELD_QUALITY ] );
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

		public function insert ( $object )
		{
			$sql  = "INSERT INTO " . self::TABLE_NAME . " (" . self::FIELD_ID . "," . self::FIELD_NAME . "," . self::FIELD_QUALITY . ") VALUES (:id,:name,:quality)";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":id", $object->getId(), PDO::PARAM_INT );
			$stmt->bindParam( ":name", $object->getName(), PDO::PARAM_STR );
			$stmt->bindParam( ":quality", $object->getQuality(), PDO::PARAM_STR );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Item cadastrado com sucesso!' : 'Falha ao tentar cadastrar Item';
		}

		public function update ( $object )
		{
			$sql  = "UPDATE " . self::TABLE_NAME . " " . "SET " . self::FIELD_NAME . " = :name, " . self::FIELD_QUALITY . " = :quality " . "WHERE " . self::FIELD_ID . " = :id;";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":id", $object->getId(), PDO::PARAM_INT );
			$stmt->bindParam( ":name", $object->getName(), PDO::PARAM_STR );
			$stmt->bindParam( ":quality", $object->getQuality(), PDO::PARAM_STR );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Item atualizado com sucesso!' : 'Falha ao tentar atualizar Item';
		}

	}