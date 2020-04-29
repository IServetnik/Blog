<?php
	namespace Core;

	use \Core\View;

	abstract class Controller
	{
		protected $view;

		//get view class
		public function __construct(array $routes)
		{	
			$viewPath = $routes["View"];
			$this->view = new View($viewPath);
		}

		abstract public function render ();
	}