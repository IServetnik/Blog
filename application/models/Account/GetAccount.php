<?php
	namespace Models\Account;

	class GetAccount
	{
		protected $controller;
		protected $parameters;

		public function __construct($parameters = null, IPostController $controller = null)
		{
			$this->parameters = $parameters;

			if (isset($controller)) {
				$this->controller = $controller;	
			} else {
				$this->controller = new DB\ControllerDB(); 
			}
		}

		public function get()
		{
			return $this->controller->get($this->parameters);
		}
	}