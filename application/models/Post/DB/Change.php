<?php
	namespace Models\Post\DB;

	use \PDO;
	use \Exception;

	class Change
	{
		public static function run($data, $newData, $db, $tblName)
		{
			//check if user published post with the same title
			if (isset($newData[DB_VALUES["Posts"]["columnName"]["title"]])) {
				$query = "SELECT * FROM $tblName WHERE ".array_key_first($data['userId'])." = '".array_values($data['userId'])[0]."' AND ".DB_VALUES["Posts"]["columnName"]["title"]." = '".$newData[DB_VALUES["Posts"]["columnName"]["title"]]."'";
				$post = $db->query($query);
				$post = $post->fetch();

				if ($post !== false) {
					throw new Exception("A post with the same title has already been published", 1);
				}
			}


			//update data
			$query = "UPDATE $tblName SET ";
			foreach ($newData as $key => $value) {
				$query .= "$key = '$value', ";
			}
			$query = substr($query, 0, -2);
			
			$query .= " WHERE ".array_key_first($data['userId'])." = '".array_values($data['userId'])[0]."' AND ".array_key_first($data['title'])." = '".array_values($data['title'])[0]."'";

			$db->exec($query);


			//change title
			if (isset($newData[DB_VALUES["Posts"]["columnName"]["title"]])) {
				$data['title'][DB_VALUES["Posts"]["columnName"]["title"]] = $newData[DB_VALUES["Posts"]["columnName"]["title"]];
			}


			//return data
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