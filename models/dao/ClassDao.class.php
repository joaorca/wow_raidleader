<?php

	Class ClassDao extends Dao implements iDao
	{

		const TABLE_NAME      = 'wow.classes';
		const FIELD_ID        = 'id';
		const FIELD_MASK      = 'mask';
		const FIELD_POWERTYPE = 'powertype';
		const FIELD_NAME      = 'name';

		public function objectBuilder ( $row )
		{
			$object = new Classs();
			$object->setId( $row[ self::FIELD_ID ] );
			$object->setMask( $row[ self::FIELD_MASK ] );
			$object->setPowerType( $row[ self::FIELD_POWERTYPE ] );
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

		public function insert ( Classs $object )
		{
			$sql  = "INSERT INTO " . self::TABLE_NAME . " (" . self::FIELD_ID . "," . self::FIELD_MASK . "," . self::FIELD_POWERTYPE . "," . self::FIELD_NAME . ") VALUES (:id,:mask,:powerType,:name)";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":mask", $object->getMask(), PDO::PARAM_STR );
			$stmt->bindParam( ":powerType", $object->getPowerType(), PDO::PARAM_STR );
			$stmt->bindParam( ":name", $object->getName(), PDO::PARAM_STR );
			$stmt->bindParam( ":id", $object->getId(), PDO::PARAM_INT );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Classe cadastrada com sucesso!' : 'Falha ao tentar cadastrar Classe';
		}

		public function update ( Classs $object )
		{
			$sql  = "UPDATE " . self::TABLE_NAME . " " . "SET " . self::FIELD_MASK . " = :mask, " . self::FIELD_POWERTYPE . " = :powerType, " . self::FIELD_NAME . " = :name " . "WHERE " . self::FIELD_ID . " = :id;";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":mask", $object->getMask(), PDO::PARAM_STR );
			$stmt->bindParam( ":powerType", $object->getPowerType(), PDO::PARAM_STR );
			$stmt->bindParam( ":name", $object->getName(), PDO::PARAM_STR );
			$stmt->bindParam( ":id", $object->getId(), PDO::PARAM_INT );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Classe atualizada com sucesso!' : 'Falha ao tentar atualizar Classe';
		}

	}