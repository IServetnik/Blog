<?php
	namespace Controllers;

	class LoginController implements InterfaceController
	{
		public static function render()
		{
			include __DIR__."/../views/LoginView.php";
		}
	}