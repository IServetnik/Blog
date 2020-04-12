<?php
	namespace Lib;

	class Cookie
	{
		public static function setCookie ($name, $data, $cookieTime)
		{
			setcookie($name, $data, $cookieTime, "/");
		}

		public static function getCookie ($name) : array
		{
			return $_COOKIE[$name];
		}

		public static function deleteCookie ($name) : void
		{
			setcookie($name, null, null, "/");
		}
	}