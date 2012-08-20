<?php

	class WowDatabase
	{

		public function updateRaces ()
		{
			$data = BlizzardAPI::getRaceDetails();
			//Utils::dump($data);
			foreach ( $data as $dt )
			{
				$race = new Race();
				$race->convertJsonToObject( $dt );
				$raceDao = new RaceDao();
				$raceDao->save( $race );
			}
		}

		public function updateClasses ()
		{
			$data = BlizzardAPI::getClassesDetails();
			//Utils::dump($data);
			foreach ( $data as $dt )
			{
				$class = new Classs();
				$class->convertJsonToObject( $dt );
				$classDao = new ClassDao();
				$classDao->save( $class );
			}
		}

		public function updateCharacter ( $realm, $name )
		{
			$data = BlizzardAPI::getCharacterDetails( $realm, $name, "guild,talents" );
			//Utils::dump($data);
			$character = new Character();
			$character->convertJsonToObject( $data );
			$characterDao = new CharacterDao();
			return $characterDao->save( $character );
		}

		public function updateFeeds ( Character $character )
		{
			$data = BlizzardAPI::getCharacterFeeds( $character->getRealm(), $character->getName() );
			//Utils::dump($data);
			foreach ( $data as $dt )
			{
				$feed = new Feed();
				$feed->convertJsonToObject( $dt );
				$feed->setCharacter( $character->getId() );
				$feedDao = new FeedDao();

				switch ( $feed->getType() )
				{
					case "LOOT"            :
						$feed->setDetails( NULL );
						$this->updateItem( $feed->getTypeValue() );
						break;
					case "ACHIEVEMENT"    :
						$feed->setDetails( NULL );
						$this->updateAchievement( $feed->getTypeValue() );
						break;
					case "CRITERIA"        :
						$feed->setDetails( $dt->criteria->description );
						$this->updateAchievement( $feed->getTypeValue() );
						break;
					case "BOSSKILL"        :
						$feed->setDetails( $dt->quantity );
						$this->updateBossKill( $dt->achievement );
						break;
				}

				$feedDao->save( $feed );

			}
		}

		public function updateItem ( $itemId )
		{
			$data = BlizzardAPI::getItemDetails( $itemId );
			//Utils::dump($data);
			if ( !empty( $data ) )
			{
				$item = new Item();
				$item->convertJsonToObject( $data );
				$itemDao = new ItemDao();
				$itemDao->save( $item );
			}
		}

		public function updateAchievement ( $achievementID )
		{
			$data = BlizzardAPI::getAchievementDetails( $achievementID );
			//Utils::dump($data);
			$achievement = new Achievement();
			$achievement->convertJsonToObject( $data );
			$achievementDao = new AchievementDao();
			$achievementDao->save( $achievement );
		}

		public function updateBossKill ( $data )
		{
			//Utils::dump($data);
			$achievement = new Achievement();
			$achievement->convertJsonToObject( $data );
			$achievementDao = new AchievementDao();
			$achievementDao->save( $achievement );
		}

	}