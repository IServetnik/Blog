<?php
	return ["/" =>  
				["Model" => "Main\MainModel", //Class after "Models"
				"View" => "/Main/MainView.php", //Name of View in dir Views
				"Controller" => "Main\MainController"], //Class after "Controllers"


			"account/login" => [
				"Model" => "Account\Account::login",
				"View" => "/Account/LoginView.php",
				"Controller" => "Account\LoginController"],

			"account/register" => [
				"Model" => "Account\Account::register",
				"View" => "/Account/RegisterView.php",
				"Controller" => "Account\RegisterController"],	

			"account/signout" => [
				"Model" => "Account\Account::signOut",
				"View" => "/Main/MainView.php",
				"Controller" => "Account\SignOutController"],

			"post" => [
				"Model" => "Post\Post",
				"View" => "/Post/PostView.php",
				"Controller" => "Post\PostController"],	

			"error/404" => [
				"Model" => "Error\ErrorModel",
				"View" => "/Error/ErrorView.php",
				"Controller" => "Error\ErrorController"]];