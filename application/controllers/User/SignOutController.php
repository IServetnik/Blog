<?php
	namespace Controllers\User;

	use \Core\Controller;
	use \Models\User\User;
	use \Models\User\DB\ControllerDB;
	use \Exception;

	class SignOutController extends Controller
	{
		public function render()
		{
			//check if user is loged
			if (!isset($_COOKIE[DB_VALUES['User']['tableName']])) {
				throw new Exception("403");
			}

			//create a new user sign out
			$user = new User();
			$user->signOut();

			header("Location: http://servetnik.com/");
		}
	}