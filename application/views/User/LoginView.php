<h1>LOGIN</h1>

<form method="POST">
	<input type="text" name="email" placeholder="email"><br>
	<input type="password" name="password" placeholder="password"><br>
	<input type="submit" name="submit" value="Login"><br><br>
</form>
<?php if (isset($parameters["errors"]["incorrectPassword"])) { ?>
	<b>Incorrect password or email</b><br>
<?php } ?>
<a href="/">Main</a>