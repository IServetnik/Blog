<?php
	namespace Models\Account\DB;

	use \Exception;
	use \PDO;
	
	class Register
	{
		public static function run($data, $db, $tblName) {
			//check if mail has already been registered
			$emails = $db->query("SELECT ".array_key_first($data['email'])." FROM $tblName");

			if ($emails) {
				$emails = $emails->fetchAll(PDO::FETCH_ASSOC);

				foreach ($emails as $value) {
					if ($value[array_key_first($data['email'])] == array_values($data['email'])[0]) {
						throw new Exception("Mail has already been registered");
					}
				}
			}
			
			//creating query to database
			$query = "INSERT INTO $tblName (";
			foreach ($data as $key1 => $value1) {
				foreach ($value1 as $key2 => $value2) {
					$query .= "$key2, ";	
				}
			}
			$query = substr($query, 0, -2);
			$query .= ") VALUES (";
			foreach ($data as $key1 => $value1) {
				foreach ($value1 as $key2 => $value2) {
					$query .= "'$value2', ";
				}
			}
			$query = substr($query, 0, -2);
			$query .= ")";

			$db->exec($query);

			// adding cookies
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

			CookieAccount::setCookie($returnData);

			return $returnData;
		}
	}