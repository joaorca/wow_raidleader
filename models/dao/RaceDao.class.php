<?php

	Class RaceDao extends Dao implements iDao
	{

		const TABLE_NAME = 'wow.races';
		const FIELD_ID   = 'id';
		const FIELD_MASK = 'mask';
		const FIELD_SIDE = 'side';
		const FIELD_NAME = 'name';

		public function objectBuilder ( $row )
		{
			$object = new Race();
			$object->setId( $row[ self::FIELD_ID ] );
			$object->setMask( $row[ self::FIELD_MASK ] );
			$object->setSide( $row[ self::FIELD_SIDE ] );
			$object->setName( $row[ self::FIELD_NAME ] );
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
			$sql  = "INSERT INTO " . self::TABLE_NAME . " (" . self::FIELD_ID . "," . self::FIELD_MASK . "," . self::FIELD_SIDE . "," . self::FIELD_NAME . ") VALUES (:id,:mask,:side,:name)";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":mask", $object->getMask(), PDO::PARAM_STR );
			$stmt->bindParam( ":side", $object->getSide(), PDO::PARAM_STR );
			$stmt->bindParam( ":name", $object->getName(), PDO::PARAM_STR );
			$stmt->bindParam( ":id", $object->getId(), PDO::PARAM_INT );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Raça cadastrada com sucesso!' : 'Falha ao tentar cadastrar Raça';
		}

		public function update ( $object )
		{
			$sql  = "UPDATE " . self::TABLE_NAME . " " . "SET " . self::FIELD_MASK . " = :mask, " . self::FIELD_SIDE . " = :side, " . self::FIELD_NAME . " = :name " . "WHERE " . self::FIELD_ID . " = :id;";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":mask", $object->getMask(), PDO::PARAM_STR );
			$stmt->bindParam( ":side", $object->getSide(), PDO::PARAM_STR );
			$stmt->bindParam( ":name", $object->getName(), PDO::PARAM_STR );
			$stmt->bindParam( ":id", $object->getId(), PDO::PARAM_INT );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Raça atualizada com sucesso!' : 'Falha ao tentar atualizar Raça';
		}

	}