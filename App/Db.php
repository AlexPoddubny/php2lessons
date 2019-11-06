<?php
	
	
	namespace App;
	
	
	class Db
	{
		use Singleton;
		
		protected $dbh;
		
		protected function __construct()
		{
			$this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=test', 'root',
				'1');
		}
		
		public function execute($sql, $param = [])
		{
			$sth = $this->dbh->prepare($sql);
			$res = $sth->execute($param);
			return $res;
		}
		
		public function query($sql, $class, $param = [])
		{
			$sth = $this->dbh->prepare($sql);
			$res = $sth->execute($param);
			if (false !== $res){
				return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
			}
			return [];
		}
	}