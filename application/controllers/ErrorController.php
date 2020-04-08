<?php
	namespace Controllers;

	class ErrorController implements InterfaceController
	{
		public static function render()
		{
			include __DIR__."/../views/ErrorView.php";
		}
	}