<?php
	/*
	The names of the database values.

	If you want to change the database values, you should only change the values, not the keys.

	Format:
		value => column_name_in_the_database.
	*/
	return ["User" => [
				"dsn" => "mysql:host=localhost;dbname=test",

				"tableName" => "User",

				"userName" => "root",

				"userPassword" => "",

				"attribute" => [PDO::ERRMODE_EXCEPTION],

				"columnName" => [
					//required names
					"email" => "email",
					"password" => "password",
					"posts_id" => "posts_id",
					//not required names
					"id" => "user_id",
					"name" => "name",
					"surname" => "surname"]	   
			],

			"Posts" => [
				"dsn" => "mysql:host=localhost;dbname=test",

				"tableName" => "Posts",

				"userName" => "root",

				"userPassword" => "",

				"attribute" => [PDO::ERRMODE_EXCEPTION],

				"columnName" => [
					//required names
					"title" => "title",
					"text" => "text",
					"user_id" => "user_id",
					//not required names
					"id" => "post_id",
					"date" => "date"]	   
			]
		];