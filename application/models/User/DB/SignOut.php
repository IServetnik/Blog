<?php
	namespace Models\User\DB;

	class SignOut
	{
		public static function run() {
			if (isset($_COOKIE[DB_VALUES['User']['tableName']])) {
				CookieUser::deleteCookie();
			}
		}
	}