<?php
	namespace Models\Post;

	class Post
	{
		protected $controller;
		protected $data;

		public function __construct(array $title, array $text, array $userId = [], array $otherData = [], IPostController $controller = null)
		{
			$this->controller = $controller;
			$this->data['title'] = $title;
			$this->data['text'] = $text;
			$this->data['userId'] = $userId;
			$this->data['otherData'] = $otherData;

			if ($userId == []) {
				if (isset($_COOKIE[DB_VALUES['Account']['tableName']])) { 
					$this->data['userId'] = $_COOKIE[DB_VALUES['Account']['tableName']][COOKIE_VALUES["Account"]['otherData']][DB_VALUES["Account"]["columnName"]["id"]];
				}
			}

			if (isset($controller)) {
				$this->controller = $controller;	
			} else {
				$this->controller = new DB\ControllerDB(); 
			}
		}

		public function publish()
		{
			$this->data = $this->controller->publish($this->data);
		}

		public function getData()
		{
			return $this->data;
		}

		public function change(array $newData)
		{
			$this->data = $this->controller->change($this->data, $newData);
		}

		public function delete()
		{
			$this->data = $this->controller->delete($this->data);
		}
	}