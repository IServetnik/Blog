<?php
	namespace Core;

	use \Core\View;

	abstract class Controller
	{
		protected $view;

		public function __construct(array $rout)
		{
			$viewPath = $rout["View"];
			$this->view = new View($viewPath);
		}

		abstract public function render ();
	}