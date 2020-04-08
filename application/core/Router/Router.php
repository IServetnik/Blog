<?php
	namespace Core\Router;

	class Router
	{
		protected $uri;
		public function __construct()
		{
			$this->uri = URI::handleURI();
		}

		public function run()
		{
			$routes = require __DIR__."/../../config/routes.php";

			foreach ($routes as $key => $value) {
				if ($key === $this->uri["path"])
				{
					$controllerClassName = "\Controllers\\".$routes[$key];

					if (class_exists($controllerClassName)) {
						$controllerClassName::render();

						return true;
					} else {
						throw new \Exception("Inncorect class");
					}

				}
			}
			throw new \Exception("Inncorect page. 404");
		}
	}