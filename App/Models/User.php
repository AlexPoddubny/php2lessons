<?php
	
	
	namespace App\Models;
	
	
	use App\Model;
	
	class User extends Model
		implements HasEmail
	{
		const TABLE = 'users';
		
		public $email;
		public $name;
		
		/**
		 * Returns user's e-mail
		 * @return string User's e-mail
		 */
		public function getEmail()
		{
			return $this->email;
		}
	}