<?php

	class BlizzardAPI
	{

		const urlAPI = "http://us.battle.net/api/wow/";
		const locale = "pt_BR";

		//const locale = "en_US";

		/**
		 * Retorna um JSON com detalhes de todas as ra�as
		 */
		public static function getRaceDetails ()
		{
			$local    = 'locale=' . self::locale;
			$query    = 'data/character/races?' . $local;
			$contents = file_get_contents( self::urlAPI . $query );
			return json_decode( $contents )->races;
		}

		/**
		 * Retorna JSON com detalhes de todas as classes
		 */
		public static function getClassesDetails ()
		{
			$local    = 'locale=' . self::locale;
			$query    = 'data/character/classes?' . $local;
			$contents = file_get_contents( self::urlAPI . $query );
			return json_decode( $contents )->classes;
		}

		/**
		 * Retorna JSON com detalhes de um determinado personagem
		 *
		 * @params realm Nome do reino do personagem
		 * @params char Nome do personagem
		 * @params fields Nomes das informa��es adicionais separadas por ','
		 */
		public static function getCharacterDetails ( $realm, $char, $fields = "" )
		{
			$char     = self::encode( $char );
			$realm    = self::encode( $realm );
			$fields   = 'fields=' . $fields;
			$local    = 'locale=' . self::locale;
			$query    = 'character/' . $realm . '/' . $char . '?' . $fields . '&' . $local;
			$contents = file_get_contents( self::urlAPI . $query );
			return json_decode( $contents );
		}

		/**
		 * Retorna JSON com os feeds de um determinado personagem
		 *
		 * @params realm Nome do reino do personagem
		 * @params char Nome do personagem
		 */
		public static function getCharacterFeeds ( $realm, $char )
		{
			return self::getCharacterDetails( $realm, $char, "feed" )->feed;
		}

		/**
		 * Retorna JSON com os detalhes de um determinado Achievemnt
		 *
		 * @params id C�digo do achievement no WoW Head
		 */
		public static function getAchievementDetails ( $id )
		{
			$local    = 'locale=' . self::locale;
			$query    = 'achievement/' . $id . '?' . $local;
			$contents = @file_get_contents( self::urlAPI . $query );
			return json_decode( $contents );
		}

		/**
		 * Retorna JSON com os detalhes de um determinado Item
		 *
		 * @params id C�digo do item no WoW Head
		 */
		public static function getItemDetails ( $id )
		{
			$local    = 'locale=' . self::locale;
			$query    = 'item/' . $id . '?' . $local;
			$contents = @file_get_contents( self::urlAPI . $query );
			return json_decode( $contents );

		}

		/**
		 * Retorna a string formatada para a API
		 */
		private static function encode ( $var )
		{
			return str_replace( '+', '%20', urlencode( $var ) );
		}
	}