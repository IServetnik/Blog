<?php
	namespace Controllers\Error;

	use \Core\Controller;

	class Error404Controller extends Controller
	{
		public function render()
		{
			//render the page
			$this->view->render("404");
		}
	}