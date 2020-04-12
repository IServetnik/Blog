<?php
	namespace Core;

	use \Lib\URI;

	class Router
	{
		protected $uri;

		public function __construct()
		{
			$this->uri = URI::handleURI();
		}

		public function run()
		{
			$routes = require INDEX_DIR."/application/config/routes.php";
			
			foreach ($routes as $key => $value) {
				if ($key === $this->uri["path"])
				{
					$controllerClassName = "\Controllers\\".$routes[$key]["Controller"];

					if (class_exists($controllerClassName)) {
						$controller = new $controllerClassName($routes[$key]);
						$controller->render();
						return true;
					} else {
						throw new \Exception("Inncorect class");
					}

				}
			}

			throw new \Exception("Inncorect page. 404");
		}
	}