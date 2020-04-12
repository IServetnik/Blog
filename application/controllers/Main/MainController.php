<?php
	namespace Controllers\Main;

	use \Core\Controller;

	class MainController extends Controller
	{
		public function render()
		{
			$this->view->render("IS");
		}
	}