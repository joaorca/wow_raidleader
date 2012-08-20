<?php

	Class AchievementDao extends Dao implements iDao
	{

		const TABLE_NAME        = 'wow.achievements';
		const FIELD_ID          = 'id';
		const FIELD_TITLE       = 'title';
		const FIELD_DESCRIPTION = 'description';

		public function objectBuilder ( $row )
		{
			$object = new Achievement();
			$object->setId( $row[ self::FIELD_ID ] );
			$object->setTitle( $row[ self::FIELD_TITLE ] );
			$object->setDescription( $row[ self::FIELD_DESCRIPTION ] );
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
			$sql  = "INSERT INTO " . self::TABLE_NAME . " (" . self::FIELD_ID . "," . self::FIELD_TITLE . "," . self::FIELD_DESCRIPTION . ") VALUES (:id,:title,:description)";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":id", $object->getId(), PDO::PARAM_INT );
			$stmt->bindParam( ":title", $object->getTitle(), PDO::PARAM_STR );
			$stmt->bindParam( ":description", $object->getDescription(), PDO::PARAM_STR );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Achievement cadastrado com sucesso!' : 'Falha ao tentar cadastrar Achievement';
		}

		public function update ( $object )
		{
			$sql  = "UPDATE " . self::TABLE_NAME . " " . "SET " . self::FIELD_TITLE . " = :title, " . self::FIELD_DESCRIPTION . " = :description " . "WHERE " . self::FIELD_ID . " = :id;";
			$stmt = $this->db->prepare( $sql );
			$stmt->bindParam( ":id", $object->getId(), PDO::PARAM_INT );
			$stmt->bindParam( ":title", $object->getTitle(), PDO::PARAM_STR );
			$stmt->bindParam( ":description", $object->getDescription(), PDO::PARAM_STR );
			$rs  = $stmt->execute();
			$msg = $rs === TRUE ? 'Achievement atualizado com sucesso!' : 'Falha ao tentar atualizar Achievement';
		}

	}