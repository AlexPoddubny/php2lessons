<?php
	
	
	namespace App;
	
	
	class Db
	{
		use Singleton;
		
		protected $dbh;
		
		protected function __construct()
		{
			$config = Config::instance()->data;
			$this->dbh = new \PDO(
				'mysql:host=' . $config['host'] .
				';dbname=' . $config['dbname'],
				$config['user'],
				$config['password']
			);
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