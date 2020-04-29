<?php
	namespace Controllers\Post;

	use \Core\Controller;
	use \Models\Post\Post;
	use \Models\User\DB\ControllerDB;
	use \Models\User\User;
	use \PDO;
	use \Exception;

	class PostController extends Controller
	{
		public function render()
		{
			//check if user is loged
			if (!isset($_COOKIE[DB_VALUES['User']['tableName']])) {
				throw new Exception("403");
			}

			try {
				if (isset($_POST['submit'])) {
					//check if title is entered
					if ($_POST['title'] !== "") {
						//create a new post and publish it
						$post = new Post([DB_VALUES['Posts']['columnName']['title'] => $_POST['title']],
														[DB_VALUES['Posts']['columnName']['text'] => $_POST['text']],
														[DB_VALUES['Posts']['columnName']['user_id'] => $_COOKIE[DB_VALUES['User']['tableName']][COOKIE_VALUES["User"]['otherData']][DB_VALUES["User"]["columnName"]["id"]]]);

						$post->publish();
						
						//create a new user and add post id
						$user = new User();
						if (!isset($user->getData()['otherData'][DB_VALUES["User"]["columnName"]["posts_id"]])) {
							$user->change([DB_VALUES["User"]["columnName"]["posts_id"] => $post->getData()['otherData'][DB_VALUES["Posts"]["columnName"]["id"]]]);
						} else {
							$user->change([DB_VALUES["User"]["columnName"]["posts_id"] => $user->getData()['otherData'][DB_VALUES["User"]["columnName"]["posts_id"]].", ".$post->getData()['otherData'][DB_VALUES["Posts"]["columnName"]["id"]]]);
						}

						header("Location: http://servetnik.com/");
					} else {
						$errors["submitedTitle"] = true;
					}
				}
			} catch (Exception $e) {
				if ($e->getCode() === 1) {
					//add errors
					if ($e->getMessage() == "A post with the same title has already been published") {
						$errors["titlePublished"] = true;
					}
				} else {
					throw new Exception($e->getMessage(), $e->getCode());
				}
			}

			//render the page
			$this->view->render("Post", isset($errors) ? ["errors" => $errors] : null);
		}
	}