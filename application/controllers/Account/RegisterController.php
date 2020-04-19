<?php
	namespace Controllers\Account;

	use \Core\Controller;
	use \Models\Account\Account;
	use \Models\Account\DB\ControllerDB;

	class RegisterController extends Controller
	{
		public function render()
		{
			$this->view->render("Register");

			if (isset($_POST['submit'])) {
				$account = new Account([DB_VALUES['Account']['columnName']['email'] => $_POST['email']],
											[DB_VALUES['Account']['columnName']['password'] => $_POST['password']],
											[DB_VALUES["Account"]["columnName"]['name'] => $_POST['name'],
												DB_VALUES["Account"]["columnName"]['surname'] => $_POST['surname']]);
				$account->register();

				header("Location: http://servetnik.com/");
			}
		}
	}