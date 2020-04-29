<?php
	namespace Core;

	use \Lib\URI;

	class Router
	{
		protected $uri;

		//get URI array with path and GET string
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
					//create a new controller and render a page
					$controllerClassName = "\Controllers\\".$routes[$key]["Controller"];

					if (class_exists($controllerClassName)) {
						$controller = new $controllerClassName($routes[$key]);
						$controller->render();
						return true;
					}
				}
			}

			throw new \Exception("404");
		}
	}