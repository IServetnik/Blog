<h1>HOME</h1>
<?php if(!isset($_COOKIE[DB_VALUES['User']['tableName']])) { ?>
	<a href="http://servetnik.com/user/register">Register</a><br>
	<a href="http://servetnik.com/user/login">Log in</a>
<?php } else { ?>
	<p>Hello, <b><?= $_COOKIE[DB_VALUES['User']['tableName']][COOKIE_VALUES["User"]["otherData"]][DB_VALUES['User']['columnName']['name']]
			." ".$_COOKIE[DB_VALUES['User']['tableName']][COOKIE_VALUES["User"]["otherData"]][DB_VALUES['User']['columnName']['surname']]; ?></b></p>
	<a href="http://servetnik.com/user/signOut">Sign out</a><br><br>

	<a href="http://servetnik.com/post">Publish post</a>
<?php } ?>

<?php if (isset($parameters["Posts"])) {
			$newPosts = [];

			foreach ($parameters["Posts"] as $key1 => $value1) {
				foreach ($value1 as $key2 => $value2) {
					$newPosts[$value2->getData()['otherData'][DB_VALUES["Posts"]["columnName"]["date"]]] = $value2;
				}
			}

			foreach ($newPosts as $key => $value) { ?>
				<div style="border: 2px solid black; width: 250px; margin: 10px 0 10px 0; padding: 10px;">
					<h3><?= $value->getData()['title'][DB_VALUES["Posts"]["columnName"]["title"]] ?></h3>
					<p><?= $value->getData()['text'][DB_VALUES["Posts"]["columnName"]["text"]] ?></p>
				</div>
			<?php }
		} ?>