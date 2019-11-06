<?php
	
	
	namespace App;
	
	
	class Config
	{
		use Singleton;
		
		public $data;
		
		protected function __construct()
		{
			/*$this->config_file =
			include_once $this->config_file;*/
			$this->data = (include __DIR__ . '/../config.php')['db'];
			//var_dump($this->data);
		}
	}