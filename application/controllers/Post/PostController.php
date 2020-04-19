<?php
	namespace Controllers\Post;

	use \Core\Controller;
	use \Models\Post\Post;
	use \Models\Account\DB\ControllerDB;
	use \Models\Account\Account;
	use \PDO;

	class PostController extends Controller
	{
		public function render()
		{
			$this->view->render("Post");

			if (isset($_POST['submit'])) {
				$post = new Post([DB_VALUES['Posts']['columnName']['title'] => $_POST['title']],
												[DB_VALUES['Posts']['columnName']['text'] => $_POST['text']],
												[DB_VALUES['Posts']['columnName']['user_id'] => $_COOKIE[DB_VALUES['Account']['tableName']][COOKIE_VALUES["Account"]['otherData']][DB_VALUES["Account"]["columnName"]["id"]]]);

				$post->publish();
				
				$account = new Account();
				if (!isset($account->getData()['otherData'][DB_VALUES["Account"]["columnName"]["posts_id"]])) {
					$account->change([DB_VALUES["Account"]["columnName"]["posts_id"] => $post->getData()['otherData'][DB_VALUES["Posts"]["columnName"]["id"]]]);
				} else {
					$account->change([DB_VALUES["Account"]["columnName"]["posts_id"] => $account->getData()['otherData'][DB_VALUES["Account"]["columnName"]["posts_id"]].", ".$post->getData()['otherData'][DB_VALUES["Posts"]["columnName"]["id"]]]);
				}

				header("Location: http://servetnik.com/");
			}
		}
	}