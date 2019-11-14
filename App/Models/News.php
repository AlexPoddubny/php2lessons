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
		
		public function fill($data)
		{
			$e = new MultiException();
			$error = false;
			foreach ($data as $prop => $value){
				if ('title' == $prop && '' == $data[$prop]){
					$e[] = new \Exception('Пустой заголовок!');
					$error = true;
				}
				if ('content' == $prop && '' == $data[$prop]){
					$e[] = new \Exception('Пустой Текст новости!');
					$error = true;
				}
				$this->$prop = $value;
			}
			if ($error){
				throw $e;
			}
		}
	}