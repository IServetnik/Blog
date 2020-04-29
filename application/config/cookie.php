<?php
	/*
	Names of cookies in which user data will be stored.

	If you want to change the names, you should only change the values, not the keys.
	*/
	return ["User" => 
				["email" => "email",
				"password" => "password",
				"otherData" => "otherData",

				"cookieTime" => time()+1*365*24*60*60]
		];