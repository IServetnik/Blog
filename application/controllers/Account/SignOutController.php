<?php
	namespace Controllers\Account;

	use \Core\Controller;
	use \Models\Account\Account;
	use \Models\Account\DB\ControllerDB;
	use \PDO;

	class SignOutController extends Controller
	{
		public function render()
		{
			$account = new Account();
			
			$account->signOut();

			header("Location: http://servetnik.com/");
		}
	}