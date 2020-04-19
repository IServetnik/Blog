<?php
	return ["Account" => [
				"dsn" => "mysql:host=localhost;dbname=test",

				"tableName" => "Account",

				"userName" => "root",

				"userPassword" => "",

				"attribute" => [PDO::ERRMODE_EXCEPTION],

				"columnName" => [
					"id" => "user_id",
					"name" => "name",
					"surname" => "surname",
					"email" => "email",          //mail => name_of_column_im_DB
					"password" => "password",
					"posts_id" => "posts_id"]  //password => name_of_column_im_DB]	   
			],

			"Posts" => [
				"dsn" => "mysql:host=localhost;dbname=test",

				"tableName" => "Posts",

				"userName" => "root",

				"userPassword" => "",

				"attribute" => [PDO::ERRMODE_EXCEPTION],

				"columnName" => [
					"id" => "post_id",
					"user_id" => "user_id",
					"title" => "title",
					"text" => "text",          //mail => name_of_column_im_DB
					"date" => "date"]  //password => name_of_column_im_DB]	   
			]
		];