<?php
	namespace Controllers;

	class MainController implements InterfaceController
	{
		public static function render()
		{
			include __DIR__."/../views/MainView.php";
		}
	}