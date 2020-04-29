<?php
	namespace Models\User;

	use \PDO;
	use \Exception;

	class User
	{	
		protected $manager;
		protected $data;

		//array format: ['name' => 'value']
		public function __construct(array $email = [], array $password = [], array $otherData = [], InterfaceUserManager $manager = null)
		{
			if ($email != [] && $password != []) {
				$this->data['email'] = [array_key_first($email) => strtolower(array_values($email)[0])];
				$this->data['password'] = $password;
				$this->data['otherData'] = $otherData;
			} else {
				if (isset($_COOKIE[DB_VALUES['User']['tableName']])) {
					//get data from cookies
					$newData = $_COOKIE[DB_VALUES['User']['tableName']];
					foreach ($newData as $key => $value) {
						if ($key == COOKIE_VALUES["User"]["email"]) {
							$this->data['email'] = $value;
						} else if ($key == COOKIE_VALUES["User"]["password"]) {
							$this->data['password'] = $value;
						} else if ($key == COOKIE_VALUES["User"]["otherData"]) {
							$this->data['otherData'] = $value;
						}
					}
				} else {
					throw new Exception('You did not enter information');
				}
			}

			if (isset($manager)) {
				$this->manager = $manager;	
			} else {
				//default manager
				$this->manager = new DB\ManagerDB(); 
			}
		}

		public function register()
		{
			$this->data = $this->manager->register($this->data);
		}

		public function login()
		{
			$this->data = $this->manager->login($this->data);
		}

		public function change(array $newData)
		{	
			$this->data = $this->manager->Change($this->data, $newData);
		}

		public function getData()
		{
			return $this->data;
		}

		public function signOut()
		{
			$this->data = $this->manager->SignOut($this->data);
		}
	}