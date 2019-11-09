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
			if ('author' == $k){
				if (isset($this->author_id)){
					return Author::findById($this->author_id);
				} else {
					return false;
				}
			}
			return null;
		}
	}