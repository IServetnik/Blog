<?php
	namespace Controllers\Main;

	use \Core\Controller;
	use \Models\Post\GetPosts;

	class MainController extends Controller
	{
		public function render()
		{
			//if user is logged in
			if (isset($_COOKIE[DB_VALUES['User']['tableName']])) {
				//get only user posts
				$posts = new GetPosts("WHERE ".DB_VALUES["Posts"]["columnName"]["user_id"]." = ".$_COOKIE[DB_VALUES["User"]["tableName"]][COOKIE_VALUES["User"]["otherData"]][DB_VALUES["User"]["columnName"]["id"]]);
			} else {
				//get all posts
				$posts = new GetPosts();
			}
			$posts = $posts->get();

			//render the page
			$this->view->render("IS", isset($posts) ? ["Posts" => $posts] : null);
		}
	}