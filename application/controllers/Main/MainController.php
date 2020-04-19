<?php
	namespace Controllers\Main;

	use \Core\Controller;
	use \Models\Post\GetPosts;

	class MainController extends Controller
	{
		public function render()
		{
			if (isset($_COOKIE[DB_VALUES['Account']['tableName']])) {
				$posts = new GetPosts("WHERE ".DB_VALUES["Posts"]["columnName"]["user_id"]." = ".$_COOKIE[DB_VALUES["Account"]["tableName"]]["otherData"][DB_VALUES["Account"]["columnName"]["id"]]);
			} else {
				$posts = new GetPosts();
			}
			$posts = $posts->get();

			$this->view->render("IS", isset($posts) ? ["Posts" => $posts] : null);
		}
	}