<?php
	namespace Models\User\DB;

	use \Exception;
	use \pdo;

	class ManagerDB implements \Models\User\InterfaceUserManager
	{
		protected $pdo;
		protected $tblName;

		function __construct(pdo $pdo = null, $tblName = null)
		{
			$this->pdo = $pdo;
			$this->tblName = $tblName;
			if (!isset($pdo)) {
				//default class pdo
				$this->pdo = new PDO(DB_VALUES["User"]['dsn'], 
								DB_VALUES["User"]['userName'],
								DB_VALUES["User"]['userPassword'],
								DB_VALUES["User"]['attribute']);
			}
			if (!isset($tblName)) {
				//default class table name
				$this->tblName = DB_VALUES["User"]['tableName'];
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