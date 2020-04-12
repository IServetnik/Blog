<?php
	namespace Models\Account;

	use \PDO;
	use \Exception;

	class Account
	{	
		protected $controller;
		protected $data;

		public function __construct(IAccountController $controller, array $email = [], array $password = [], array $otherData = [])
		//['name' => 'value']
		{
			if ($email != [] && $password != []) {
				$this->data['email'] = [DB_VALUES["Account"]["columnName"]["email"] => strtolower(array_values($email)[0])];
				$this->data['password'] = [DB_VALUES["Account"]["columnName"]["password"] => array_values($password)[0]];
				$this->data['otherData'] = $otherData;
			} else {
				if (isset($_COOKIE[DB_VALUES['Account']['tableName']])) {     
					$this->data = $_COOKIE[DB_VALUES['Account']['tableName']];
				} else {
					throw new Exception('Вы не ввели информацию');
				}
			}

			$this->controller = $controller;
		}

		public function register()
		{
			$this->data = $this->controller->register($this->data);
		}

		public function login()
		{
			$this->data = $this->controller->login($this->data);
		}

		public function change(array $newData)
		{	
			$this->data = $this->controller->Change($this->data, $newData);
		}

		public function getData()
		{
			return $this->data;
		}

		public function signOut()
		{
			$this->data = $this->controller->SignOut($this->data);
		}
	}