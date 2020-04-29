<?php
	namespace Models\User;

	class GetUser
	{
		protected $manager;
		protected $parameters;

		public function __construct($parameters = null, IPostManager $manager = null)
		{
			$this->parameters = $parameters;

			if (isset($manager)) {
				$this->manager = $manager;	
			} else {
				//default manager
				$this->manager = new DB\ManagerDB(); 
			}
		}

		public function get()
		{
			return $this->manager->get($this->parameters);
		}
	}