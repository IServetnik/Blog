<?php
	namespace Controllers\Error;

	use \Core\Controller;

	class ErrorController extends Controller
	{
		public function render()
		{
			$this->view->render("404");
		}
	}