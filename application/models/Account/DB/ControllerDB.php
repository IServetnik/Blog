<?php
	namespace Models\Account\DB;

	use \Exception;
	use \pdo;

	class ControllerDB implements \Models\Account\IAccountController
	{
		protected $pdo;
		protected $tblName;

		function __construct(pdo $pdo = null, $tblName = null)
		{
			$this->pdo = $pdo;
			$this->tblName = $tblName;
			if (!isset($pdo)) {
				$this->pdo = new PDO(DB_VALUES["Account"]['dsn'], 
								DB_VALUES["Account"]['userName'],
								DB_VALUES["Account"]['userPassword'],
								DB_VALUES["Account"]['attribute']);
			}
			if (!isset($tblName)) {
				$this->tblName = DB_VALUES["Account"]['tableName'];
			}
		}

		public function register(array $data) : array
		{
			return Register::run($data, $this->pdo, $this->tblName);
		}

		public function login(array $data) : array
		{
			return Login::run($data, $this->pdo, $this->tblName);
		}

		public function change(array $data, array $newData) : array
		{
			return Change::run($data, $newData, $this->pdo, $this->tblName);
		}

		public function get($parameters) : array
		{
			return Get::run($parameters, $this->pdo, $this->tblName);
		}

		public function signOut(array $data) : void
		{
			SignOut::run($data);
		}
	}