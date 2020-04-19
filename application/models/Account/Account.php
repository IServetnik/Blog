<?php
	namespace Models\Account;

	use \PDO;
	use \Exception;

	class Account
	{	
		protected $controller;
		protected $data;

		public function __construct(array $email = [], array $password = [], array $otherData = [], IAccountController $controller = null)
		//['name' => 'value']
		{
			if ($email != [] && $password != []) {
				$this->data['email'] = [array_key_first($email) => strtolower(array_values($email)[0])];
				$this->data['password'] = $password;
				$this->data['otherData'] = $otherData;
			} else {
				if (isset($_COOKIE[DB_VALUES['Account']['tableName']])) { 
					$this->data = $_COOKIE[DB_VALUES['Account']['tableName']];
				} else {
					throw new Exception('You did not enter information');
				}
			}

			if (isset($controller)) {
				$this->controller = $controller;	
			} else {
				$this->controller = new DB\ControllerDB(); 
			}
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