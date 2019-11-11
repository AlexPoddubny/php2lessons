<?php
	
	
	namespace App\Models;
	
	
	use App\Model;
	
	class News
		extends Model
	{
		const TABLE = 'news';
		
		public $id;
		public $title;
		public $content;
		public $author_id;
		
		public function __get($k)
		{
			switch ($k) {
				case 'author':
					return Author::findById($this->author_id);
					break;
				default:
					return null;
			}
		}
		
		public function __isset($k)
		{
			switch ($k) {
				case 'author':
					return !empty($this->author_id);
					break;
				default:
					return false;
			}
		}
	}