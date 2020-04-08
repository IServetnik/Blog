<?php
	require_once __DIR__."/vendor/autoload.php";

	try {
		$router = new \Core\Router\Router();
		$router->run();
	} catch (Exception $e) {
		if ($e->getMessage() === "Inncorect page. 404") {
			header("Location: http://servetnik.com/Error/404");
		}
	}