<?php
	
	
	namespace App;
	
	
	class Logger
	{
		protected const LOGFILE = __DIR__ . '/Logs/errors.log';
		
		public static function logError(MultiException $err)
		{
			foreach ($err as $e){
				file_put_contents(self::LOGFILE, 'Файл: ' . $e->getFile() . ' | Строка: ' . $e->getLine() .
					' | Время: ' . date('d.m.Y H:i:s', time()) .
					' | Сообщение: ' .  $e->getMessage() . PHP_EOL, FILE_APPEND);
			}
		}
	}