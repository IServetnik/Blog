<?php
	namespace Models\Account\DB;

	use \PDO;
	use \Models\Account\Account;

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
				$email;
				$password;
				$otherData;
				$controller = new ControllerDB($db, $tblName);

				foreach ($value1 as $key2 => $value2) {
					if ($key2 == DB_VALUES["Account"]["columnName"]["email"]) {
						$email[$key2] = $value2;
					} else if ($key2 == DB_VALUES["Account"]["columnName"]["password"]) {
						$password[$key2] = $value2;
					} else {
						$otherData[$key2] = $value2;
					}
				}
				if (isset($email) && isset($password)) {
					$returnPosts[$otherData[DB_VALUES["Account"]["columnName"]["id"]]] = 
											new Account($email, $password, $otherData, $controller);
				}
			}
			
			return isset($returnPosts) ? $returnPosts : [];
		}
	}