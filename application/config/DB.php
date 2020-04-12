<?php
	return ["Account" => [
				"dsn" => "mysql:host=localhost;dbname=test",

				"tableName" => "Account",

				"userName" => "root",

				"userPassword" => "",

				"attribute" => [PDO::ERRMODE_EXCEPTION],

				"columnName" => [
					"id" => "id",
					"name" => "name",
					"surname" => "surname",
					"email" => "email",          //mail => name_of_column_im_DB
					"password" => "password"]  //password => name_of_column_im_DB]	   
				]

		];