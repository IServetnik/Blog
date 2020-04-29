<?php
	namespace Core;

	class View
	{
		protected $view;
		protected $layout = "default.php";

		public function __construct(string $view)
		{
			//get view path
			$view = INDEX_DIR."/application/views".$view;
			if (file_exists($view)) {
				$this->view = $view;
			}
		}

		public function setLayout(string $layout)
		{
			$this->layout = $layout;
		}

		//render page
		public function render(string $title = "IS", array $parameters = null)
		{
			ob_start();
			require $this->view;
			$content = ob_get_clean();
			require INDEX_DIR."/application/views/Layouts/".$this->layout;
		}
	}