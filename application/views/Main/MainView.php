<h1>HOME</h1>
<?php if(!isset($_COOKIE[DB_VALUES['Account']['tableName']])) { ?>
	<a href="http://servetnik.com/account/register">Register</a><br>
	<a href="http://servetnik.com/account/login">LogIn</a>
<?php } else { ?>
	<p>Hello, <b><?= $_COOKIE[DB_VALUES['Account']['tableName']]["otherData"][DB_VALUES['Account']['columnName']['name']]
			." ".$_COOKIE[DB_VALUES['Account']['tableName']]["otherData"][DB_VALUES['Account']['columnName']['surname']]; ?></b></p>
	<a href="http://servetnik.com/account/signOut">SignOut</a><br><br>

	<a href="http://servetnik.com/post">Public post</a>
<?php } ?>

<?php if (isset($parameters["Posts"])) {
			foreach ($parameters["Posts"] as $key1 => $value1) {
				foreach ($value1 as $key2 => $value2) { ?>
					<h3><?= $value2->getData()['title'][DB_VALUES["Posts"]["columnName"]["title"]] ?></h3>
				<?php }
			}
		} ?>