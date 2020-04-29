<?php
	namespace Models\Post\DB;

	use \Exception;
	use \pdo;

	class ControllerDB implements \Models\Post\IPostController
	{
		protected $pdo;
		protected $tblName;

		function __construct(pdo $pdo = null, $tblName = null)
		{
			$this->pdo = $pdo;
			$this->tblName = $tblName;
			if (!isset($pdo)) {
				//default class pdo
				$this->pdo = new PDO(DB_VALUES["Posts"]['dsn'], 
								DB_VALUES["Posts"]['userName'],
								DB_VALUES["Posts"]['userPassword'],
								DB_VALUES["Posts"]['attribute']);
			}
			if (!isset($tblName)) {
				//default table name
				$this->tblName = DB_VALUES["Posts"]['tableName'];
			}
		}

		public function publish(array $data) : array
		{
			return Publish::run($data, $this->pdo, $this->tblName);
		}

		public function get($parameters) : array
		{
			return Get::run($parameters, $this->pdo, $this->tblName);
		}

		public function change(array $data, array $newData) : array
		{
			return Change::run($data, $newData, $this->pdo, $this->tblName);
		}

		public function delete(array $data) : void
		{
			Delete::run($data, $this->pdo, $this->tblName);
		}
	}