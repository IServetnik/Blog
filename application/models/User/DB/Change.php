<?php
	namespace Models\User\DB;

	use \Exception;
	use \pdo;

	class Change
	{	
		public static function run ($data, $newData, $db, $tblName)
		{	
			//update data
			$query = "UPDATE $tblName SET ";
			foreach ($newData as $key => $value) {
				$query .= "$key = '$value', ";
			}
			$query = substr($query, 0, -2);

			$query .= " WHERE ".array_key_first($data['email'])." = '".array_values($data['email'])[0]."'";

			$db->exec($query);


			//change email
			if (isset($newData[DB_VALUES["User"]["columnName"]["email"]])) {
				$data['email'][DB_VALUES["User"]["columnName"]["email"]] = $newData[DB_VALUES["User"]["columnName"]["email"]];
			}


			//set data in cookies
			$query = "SELECT * FROM $tblName WHERE ".array_key_first($data['email'])." = '".array_values($data['email'])[0]."'";
			$user = $db->query($query);
			$user = $user->fetch(PDO::FETCH_ASSOC);

			$returnData;

			foreach ($user as $key => $value) {
				if ($key == array_key_first($data['email'])) {
					$returnData['email'][$key] = $value;
				} elseif ($key == array_key_first($data['password'])) {
					$returnData['password'][$key] = $value;
				} else {
					$returnData['otherData'][$key] = $value;
				}
			}

			CookieUser::setCookie($returnData);

			return $returnData;
		}
	}