<?php
	/*
	The names of the routes.

	If you want to change the values ​​of routes, you should change only the values, not the keys.

	Format: 
		Model => class_name_after_the_Models_namespace
		View => view_name_in_dir_Views
		Controller => class_name_after_the_Controllers_namespace
	*/
	return ["/" =>  [
				"Model" => "Main\MainModel",
				"View" => "/Main/MainView.php",
				"Controller" => "Main\MainController"],


			"user/login" => [
				"Model" => "User\User::login",
				"View" => "/User/LoginView.php",
				"Controller" => "User\LoginController"],

			"user/register" => [
				"Model" => "User\User::register",
				"View" => "/User/RegisterView.php",
				"Controller" => "User\RegisterController"],	

			"user/signout" => [
				"Model" => "User\User::signOut",
				"View" => "/Main/MainView.php",
				"Controller" => "User\SignOutController"],


			"post" => [
				"Model" => "Post\Post",
				"View" => "/Post/PostView.php",
				"Controller" => "Post\PostController"],	


			"error" => [
				"Model" => null,
				"View" => "/Error/ErrorView.php",
				"Controller" => "Error\ErrorController"],

			"error/403" => [
				"Model" => null,
				"View" => "/Error/Error403View.php",
				"Controller" => "Error\Error403Controller"],

			"error/404" => [
				"Model" => null,
				"View" => "/Error/Error404View.php",
				"Controller" => "Error\Error404Controller"]
			];