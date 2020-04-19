<?php
	namespace Core;

	class View
	{
		protected $path;
		protected $layout = "default.php";

		public function __construct(string $path)
		{
			$path = INDEX_DIR."/application/views".$path;
			if (file_exists($path)) {
				$this->path = $path;
			}
		}

		public function setLayout(string $layout)
		{
			$this->layout = $layout;
		}

		public function render(string $title = "IS", array $parameters = null)
		{
			ob_start();
			require $this->path;
			$content = ob_get_clean();
			require INDEX_DIR."/application/views/Layouts/".$this->layout;
		}
	}