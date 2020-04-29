<?php
	define('INDEX_DIR', __DIR__);
	define("DB_VALUES", require INDEX_DIR."/application/config/DB.php");
	define("COOKIE_VALUES", require INDEX_DIR."/application/config/cookie.php");

	require_once INDEX_DIR."/vendor/autoload.php";

	try {
		$router = new \Core\Router();
		$router->run();
	} catch (Exception $e) {
		\Core\Error::run($e->getMessage());
	}