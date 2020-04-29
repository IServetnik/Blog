<?php
	namespace Models\User;
	 
	interface InterfaceUserManager
	{
		public function register(array $data) : array;
		public function login(array $data) : array;
		public function change(array $data, array $newData) : array;
		public function get($parameters) : array;
		public function signOut(array $data) : void;
	}