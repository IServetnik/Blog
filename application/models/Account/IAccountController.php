<?php
	namespace Models\Account;
	 
	interface IAccountController
	{
		public function register(array $data) : array;
		public function login(array $data) : array;
		public function change(array $data, array $newData) : array;
		public function get($parameters) : array;
		public function signOut(array $data) : void;
	}