<?php
	namespace Models\Account\DB;

	use \Exception;
	use \PDO;

	class Login
	{
		public static function run($data, $db, $tblName)
		{
			$query = "SELECT * FROM $tblName WHERE ".array_key_first($data['email'])." = '".array_values($data['email'])[0]."'";
			$user = $db->query($query);
			$user = $user->fetch(PDO::FETCH_ASSOC);

			if ($user[array_key_first($data['password'])] == array_values($data['password'])[0]) {
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
			} else {
				throw new Exception("Incorect password");
			}
		}
	}