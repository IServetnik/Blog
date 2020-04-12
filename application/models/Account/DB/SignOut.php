<?php
	namespace Models\Account\DB;

	class SignOut
	{
		public static function run() {
			if (isset($_COOKIE[DB_VALUES['Account']['tableName']])) {
				CookieAccount::deleteCookie();
			}
		}
	}