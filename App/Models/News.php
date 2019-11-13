<?php
	
	
	namespace App\Models;
	
	
	use App\Model;
	use App\MultiException;
	
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
		
		public function fill($data = [])
		{
			$e = new MultiException();
			if (true){
				$e[] = new \Exception('Заголовок неверный');
			}if (true){
				$e[] = new \Exception('Текст неверный');
			}
			throw $e;
		}
	}