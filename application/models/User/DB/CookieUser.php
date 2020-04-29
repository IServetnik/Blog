<?php
	namespace Models\User\DB;

	use \Lib\Cookie;

	class CookieUser
	{
		public static function setCookie (array $data)
		{
			foreach ($data as $key1 => $value1) {
				foreach ($value1 as $key2 => $value2) {
					if ($key1 == "email") {
						Cookie::setCookie(DB_VALUES['User']['tableName']."[".COOKIE_VALUES['User']['email']."]"."[$key2]", $value2, COOKIE_VALUES['User']['cookieTime']);
					} else if ($key1 == "password") {
						Cookie::setCookie(DB_VALUES['User']['tableName']."[".COOKIE_VALUES['User']['password']."]"."[$key2]", $value2, COOKIE_VALUES['User']['cookieTime']);
					} else if ($key1 == "otherData") {
						Cookie::setCookie(DB_VALUES['User']['tableName']."[".COOKIE_VALUES['User']['otherData']."]"."[$key2]", $value2, COOKIE_VALUES['User']['cookieTime']);
					} else {
						Cookie::setCookie(DB_VALUES['User']['tableName']."[$key1][$key2]", $value2, COOKIE_VALUES['User']['cookieTime']);
					}
				}
			}
		}

		public static function getCookie()
		{
			Cookie::getCookie(DB_VALUES['User']['tableName']);
		}

		public static function deleteCookie()
		{
			foreach ($_COOKIE[DB_VALUES["User"]["tableName"]] as $key1 => $value1) {
				foreach ($value1 as $key2 => $value2) {
					Cookie::deleteCookie(DB_VALUES["User"]["tableName"]."[$key1][$key2]");
				}
			}
		}
	}