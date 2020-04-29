<?php
	namespace Models\Post;

	class Post
	{
		protected $controller;
		protected $data;

		//array format: ['name' => 'value']
		public function __construct(array $title, array $text, array $userId = [], array $otherData = [], IPostController $controller = null)
		{
			$this->controller = $controller;
			$this->data['title'] = $title;
			$this->data['text'] = $text;
			$this->data['userId'] = $userId;
			$this->data['otherData'] = $otherData;

			if ($userId == []) {
				if (isset($_COOKIE[DB_VALUES['User']['tableName']])) {
					//get data from cookies
					$this->data['userId'] = $_COOKIE[DB_VALUES['User']['tableName']][COOKIE_VALUES["User"]['otherData']][DB_VALUES["User"]["columnName"]["id"]];
				}
			}

			if (isset($controller)) {
				$this->controller = $controller;	
			} else {
				//default manager
				$this->controller = new DB\ControllerDB(); 
			}
		}

		public function publish()
		{
			$this->data = $this->controller->publish($this->data);
		}

		public function change(array $newData)
		{
			$this->data = $this->controller->change($this->data, $newData);
		}

		public function getData()
		{
			return $this->data;
		}
		
		public function delete()
		{
			$this->data = $this->controller->delete($this->data);
		}
	}