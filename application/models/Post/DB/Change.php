<?php
	namespace Models\Post\DB;

	class Change
	{
		public static function run($data, $newData, $db, $tblName)
		{
			$query = "UPDATE $tblName SET ";
			foreach ($newData as $key => $value) {
				$query .= "$key = '$value', ";
			}
			$query = substr($query, 0, -2);
			
			$query .= " WHERE ".array_key_first($data['userId'])." = '".array_values($data['userId'])[0]."' AND ".array_key_first($data['title'])." = '".array_values($data['title'])[0]."'";

			$db->exec($query);

			//returnData
			$query = "SELECT * FROM $tblName WHERE ".array_key_first($data['userId'])." = '".array_values($data['userId'])[0]."' AND ".array_key_first($data['title'])." = '".array_values($data['title'])[0]."'";
			$post = $db->query($query);

			$post = $post->fetch(PDO::FETCH_ASSOC);

			$returnData;

			foreach ($post as $key => $value) {
				if ($key == array_key_first($data['title'])) {
					$returnData['title'][$key] = $value;
				} elseif ($key == array_key_first($data['text'])) {
					$returnData['text'][$key] = $value;
				} elseif ($key == array_key_first($data['userId'])) {
					$returnData['userId'][$key] = $value;
				} else {
					$returnData['otherData'][$key] = $value;
				}
			}

			return $returnData;
		}
	}