<h1>HOME</h1>
<?php if(!isset($_COOKIE[DB_VALUES['Account']['tableName']])) { ?>
	<a href="http://servetnik.com/account/register">Зарегестрироваться</a><br>
	<a href="http://servetnik.com/account/login">Войти</a>
<?php } else { ?>
	<p>Здраствуйте, <b><?= $_COOKIE[DB_VALUES['Account']['tableName']]["otherData"][DB_VALUES['Account']['columnName']['name']]
			." ".$_COOKIE[DB_VALUES['Account']['tableName']]["otherData"][DB_VALUES['Account']['columnName']['surname']]; ?></b></p>
	<a href="http://servetnik.com/account/signOut">Выйти</a>
<?php } ?>