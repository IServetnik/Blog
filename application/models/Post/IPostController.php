<?php
	namespace Models\Post;
	 
	interface IPostController
	{
		public function publish(array $data) : array;
		public function get($parameters) : array;
		public function change(array $data, array $newData) : array;
		public function delete(array $data) : void;
	}