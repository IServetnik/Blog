<h1>REGISTER</h1>
	
<form method="POST">
	<input type="text" name="name" placeholder="name"><br>
	<input type="text" name="surname" placeholder="surname"><br>
	<input type="text" name="email" placeholder="email"><br>
	<input type="password" name="password" placeholder="password"><br>
	<input type="submit" name="submit" value="Register"><br><br>
</form>
<?php if (isset($parameters["errors"]["mailRegisted"])) { ?>
	<b>Mail has already been registered</b><br>
<?php } ?>
<a href="/">Main</a>