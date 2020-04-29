<?php
	namespace Core;

	use \Lib\URI;

	class Error
	{
		protected $error;

		//error redirection
		public static function run($error)
		{
			switch ($error) {
				case '403':
					header("Location: http://servetnik.com/Error/403");
					break;
				
				case '404':
					header("Location: http://servetnik.com/Error/404");
					break;

				default:
					header("Location: http://servetnik.com/Error");
					break;
			}
		}
	}