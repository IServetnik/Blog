<h1>POST</h1>

<form method="POST">
	<p>Title:</p>
	<input type="text" name="title" placeholder="title"><br>
	<p>Text:</p>
	<textarea name="text" cols="30" rows="10" placeholder="text"></textarea><br>
	<input type="submit" name="submit" value="Publish"><br><br>
</form>
<?php if (isset($parameters["errors"])) {
			if (isset($parameters["errors"]["titlePublished"])) { ?>
				<b>A post with the same title has already been published</b><br>
			<?php } elseif (isset($parameters["errors"]["submitedTitle"])) { ?>
				<b>You did not enter a title</b><br>
			<?php } else { ?>
				<b>Error</b><br>
			<?php } 
		} ?>
<a href="/">Main</a>