<?php
	namespace Models\Account\DB;

	use \Lib\Cookie;

	class CookieAccount
	{
		public static function setCookie (array $data)
		{
			foreach ($data as $key1 => $value1) {
				foreach ($value1 as $key2 => $value2) {
					if ($key1 == "email") {
						Cookie::setCookie(DB_VALUES['Account']['tableName']."[".COOKIE_VALUES['Account']['email']."]"."[$key2]", $value2, COOKIE_VALUES['Account']['cookieTime']);
					} else if ($key1 == "password") {
						Cookie::setCookie(DB_VALUES['Account']['tableName']."[".COOKIE_VALUES['Account']['password']."]"."[$key2]", $value2, COOKIE_VALUES['Account']['cookieTime']);
					} else if ($key1 == "otherData") {
						Cookie::setCookie(DB_VALUES['Account']['tableName']."[".COOKIE_VALUES['Account']['otherData']."]"."[$key2]", $value2, COOKIE_VALUES['Account']['cookieTime']);
					} else {
						Cookie::setCookie(DB_VALUES['Account']['tableName']."[$key1][$key2]", $value2, COOKIE_VALUES['Account']['cookieTime']);
					}
				}
			}
		}

		public static function getCookie()
		{
			Cookie::getCookie(DB_VALUES['Account']['tableName']);
		}

		public static function deleteCookie()
		{
			foreach ($_COOKIE[DB_VALUES["Account"]["tableName"]] as $key1 => $value1) {
				foreach ($value1 as $key2 => $value2) {
					Cookie::deleteCookie(DB_VALUES["Account"]["tableName"]."[$key1][$key2]");
				}
			}
		}
	}