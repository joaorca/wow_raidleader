<?php

	error_reporting( E_ALL & ~E_STRICT ); # report all errors
	//ini_set("display_errors", "0"); # but do not echo the errors
	//ini_set("track_errors", "off");
	ini_set( 'max_execution_time', 0 );
	ini_set( "precision", "14" );
	date_default_timezone_set( 'America/Sao_Paulo' );

	require_once 'config.inc.php';

	require_once SMARTY_DIR . 'SmartyBC.class.php';
	require_once LIB_DIR . 'SmartyExtended.class.php';
	require_once LIB_DIR . 'BlizzardAPI.class.php';
	require_once LIB_DIR . 'Utils.class.php';
	require_once LIB_DIR . 'Connection.class.php';
	require_once LIB_DIR . 'DBSingleton.class.php';
	require_once LIB_DIR . 'WowDatabase.class.php';

	require_once MODEL_DIR . "Character.class.php";
	require_once MODEL_DIR . "Race.class.php";
	require_once MODEL_DIR . "Classs.class.php";
	require_once MODEL_DIR . "Feed.class.php";
	require_once MODEL_DIR . "Item.class.php";
	require_once MODEL_DIR . "Achievement.class.php";
	require_once MODEL_DIR . "Member.class.php";

	require_once DAO_DIR . "iDao.class.php";
	require_once DAO_DIR . "Dao.class.php";
	require_once DAO_DIR . "CharacterDao.class.php";
	require_once DAO_DIR . "RaceDao.class.php";
	require_once DAO_DIR . "ClassDao.class.php";
	require_once DAO_DIR . "FeedDao.class.php";
	require_once DAO_DIR . "ItemDao.class.php";
	require_once DAO_DIR . "AchievementDao.class.php";
	require_once DAO_DIR . "MemberDao.class.php";