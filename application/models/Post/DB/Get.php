<?php
	namespace Models\Post\DB;

	use \PDO;

	class Get
	{
		public static function run($parameters, PDO $db, $tblName)
		{
			$query = "SELECT * FROM $tblName ";

			if (isset($parameters)) {
				$query .= $parameters;
			}

			$posts = $db->query($query);

			$posts = $posts->fetchAll(PDO::FETCH_ASSOC);

			$returnPosts;
			foreach ($posts as $key1 => $value1) {
				$title;
				$text;
				$userId;
				$otherData;
				$controller = new ControllerDB($db, $tblName);

				$id;
				foreach ($value1 as $key2 => $value2) {
					if ($key2 == DB_VALUES["Posts"]["columnName"]["title"]) {
						$title[$key2] = $value2;
					} else if ($key2 == DB_VALUES["Posts"]["columnName"]["text"]) {
						$text[$key2] = $value2;
					} else if ($key2 == DB_VALUES["Posts"]["columnName"]["user_id"]) {
						$userId[$key2] = $value2;
					} else if ($key2 == DB_VALUES["Posts"]["columnName"]["id"]) {
						$id[$key2] = $value2;
					} else {
						$otherData[$key2] = $value2;
					}
				}
				if (isset($title) && isset($text) && isset($userId)) {
					$returnPosts[$userId[DB_VALUES["Posts"]["columnName"]["user_id"]]][$id[DB_VALUES["Posts"]["columnName"]["id"]]] = new \Models\Post\Post($title, $text, $userId, $otherData, $controller);
				}
			}

			return isset($returnPosts) ? $returnPosts : [];
		}
	}