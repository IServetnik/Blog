<?php
	namespace Models\Post\DB;

	use \PDO;
	use \Exception;

	class Publish
	{
		public static function run($data, $db, $tblName)
		{
			//check if user published post with the same title
			$query = "SELECT * FROM $tblName WHERE ".array_key_first($data['userId'])." = '".array_values($data['userId'])[0]."' AND ".array_key_first($data['title'])." = '".array_values($data['title'])[0]."'";
			$post = $db->query($query);
			$post = $post->fetch();

			if ($post !== false) {
				throw new Exception("A post with the same title has already been published", 1);
			}


			//insert data
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