<?php
	namespace Core\Router;

	class URI
	{
			public static function handleURI()
			{
				$uri = self::getURI();

				preg_match("/^\/(?<path>[^?]+?)?(\?.*)*$/i", $uri, $uri);

				return ["path" => isset($uri['path'])&&$uri['path']!=="" ? strtolower($uri['path']) : "/", 
						"GET" => isset($uri['GET'])&&$uri['GET']!=="" ? $uri['GET'] : null];
			}

			public static function getURI()
			{
				return $_SERVER['REQUEST_URI'];
			}
	}