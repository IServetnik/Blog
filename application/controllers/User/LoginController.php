<?php
	namespace Controllers\User;

	use \Core\Controller;
	use \Models\User\User;
	use \Models\User\DB\ControllerDB;
	use \Exception;

	class LoginController extends Controller
	{
		public function render()
		{
			//check if user is loged
			if (isset($_COOKIE[DB_VALUES['User']['tableName']])) {
				throw new Exception("403");
			}

			try {
				if (isset($_POST['submit'])) {
					//create a new user and log in
					$user = new User([DB_VALUES['User']['columnName']['email'] => $_POST['email']],
												[DB_VALUES['User']['columnName']['password'] => md5($_POST['password'])]);
					$user->login();
					header("Location: http://servetnik.com/");
				}
			} catch (Exception $e) {
				if ($e->getCode() === 1) {
					//add errors
					if ($e->getMessage() == "Incorrect password") {
						$errors["incorrectPassword"] = true;
					}
				} else {
					throw new Exception($e->getMessage(), $e->getCode());
				}
			}

			//render the page
			$this->view->render("Login", isset($errors) ? ["errors" => $errors] : null);
		}
	}