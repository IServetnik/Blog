<?php
	namespace Models\Account\DB;

	use \Exception;
	use \pdo;

	class ControllerDB implements \Models\Account\IAccountController
	{
		protected $db;
		protected $tblName;

		function __construct(pdo $db, $tblName)
		{
			$this->db = $db;
			$this->tblName = $tblName;
		}

		public function register(array $data) : array
		{
			return Register::run($data, $this->db, $this->tblName);
		}

		public function login(array $data) : array
		{
			return Login::run($data, $this->db, $this->tblName);
		}

		public function change(array $data, array $newData) : array
		{
			return Change::run($data, $newData, $this->db, $this->tblName);
		}

		public function signOut(array $data) : void
		{
			SignOut::run($data);
		}
	}