<?php
	namespace Models\Post\DB;

	use \PDO;

	class Delete
	{
		public static function run($data, $db, $tblName)
		{
			$query = "DELETE FROM $tblName WHERE ".array_key_first($data['userId'])." = '".array_values($data['userId'])[0]."' AND ".array_key_first($data['title'])." = '".array_values($data['title'])[0]."'";

			$user = $db->exec($query);
		}
	}