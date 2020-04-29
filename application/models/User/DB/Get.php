<?php
	namespace Models\User\DB;

	use \PDO;
	use \Models\User\User;

	class Get
	{
		public static function run($parameters, PDO $db, $tblName)
		{
			//get data
			$query = "SELECT * FROM $tblName ";

			if (isset($parameters)) {
				$query .= $parameters;
			}

			$posts = $db->query($query);

			$posts = $posts->fetchAll(PDO::FETCH_ASSOC);

			$returnPosts;
			foreach ($posts as $key1 => $value1) {
				$email;
				$password;
				$otherData;
				$controller = new ManagerDB($db, $tblName);

				foreach ($value1 as $key2 => $value2) {
					if ($key2 == DB_VALUES["User"]["columnName"]["email"]) {
						$email[$key2] = $value2;
					} else if ($key2 == DB_VALUES["User"]["columnName"]["password"]) {
						$password[$key2] = $value2;
					} else {
						$otherData[$key2] = $value2;
					}
				}
				if (isset($email) && isset($password)) {
					//create class User
					$returnPosts[$otherData[DB_VALUES["User"]["columnName"]["id"]]] = 
											new User($email, $password, $otherData, $controller);
				}
			}
			
			return isset($returnPosts) ? $returnPosts : [];
		}
	}