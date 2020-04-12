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
			$dbNames = require INDEX_DIR."/application/config/DB.php";

			$pdo = new PDO($dbNames["Account"]['dsn'], 
								$dbNames["Account"]['userName'],
								$dbNames["Account"]['userPassword'],
								$dbNames["Account"]['attribute']);
			$controllerDB = new ControllerDB($pdo, $dbNames["Account"]['tableName']);

			$account = new Account($controllerDB);
			$account->signOut();

			header("Location: http://servetnik.com/");
		}
	}