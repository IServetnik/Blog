<?php
	namespace Controllers\Error;

	use \Core\Controller;

	class ErrorController extends Controller
	{
		public function render()
		{
			//render the page
			$this->view->render("Error");
		}
	}