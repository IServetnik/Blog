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
				if (isset($_POST['submit'])) {
					$pdo = new PDO(DB_VALUES["Account"]['dsn'], 
									DB_VALUES["Account"]['userName'],
									DB_VALUES["Account"]['userPassword'],
									DB_VALUES["Account"]['attribute']);
					$controllerDB = new ControllerDB($pdo, DB_VALUES["Account"]['tableName']);

					$account = new Account($controllerDB, [DB_VALUES['Account']['columnName']['email'] => $_POST['email']],
															[DB_VALUES['Account']['columnName']['password'] => $_POST['password']]);
					$account->login();

					header("Location: http://servetnik.com/");
				}
			}
		}
	}