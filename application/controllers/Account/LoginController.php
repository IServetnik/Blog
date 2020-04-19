<?php
	namespace Controllers\Account;

	use \Core\Controller;
	use \Models\Account\Account;
	use \Models\Account\DB\ControllerDB;
	use \PDO;

	class LoginController extends Controller
	{
		public function render()
		{
			$this->view->render("Login");

			if (isset($_POST['submit'])) {
				$account = new Account([DB_VALUES['Account']['columnName']['email'] => $_POST['email']],
											[DB_VALUES['Account']['columnName']['password'] => $_POST['password']]);
				$account->login();

				header("Location: http://servetnik.com/");
			}
		}
	}