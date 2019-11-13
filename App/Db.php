<?php
	
	
	namespace App;
	
	
	use PDO;
	
	class Db
	{
		use Singleton;
		
		protected $dbh;
		
		protected function __construct()
		{
			$config = Config::instance()->data;
			try {
				$this->dbh = new PDO(
					'mysql:host=' . $config['host'] .
					';dbname=' . $config['dbname'],
					$config['user'],
					$config['password']
				);
			} catch (\PDOException $e){
				throw new \App\Exceptions\Db($e->getMessage());
			}
		}
		
		public function execute($sql, $param = [])
		{
			$sth = $this->dbh->prepare($sql);
			$res = $sth->execute($param);
			//var_dump($res);
			return $res;
		}
		
		public function query($sql, $class, $param = [])
		{
			//var_dump($sql, $param);
			$sth = $this->dbh->prepare($sql);
			$res = $sth->execute($param);
			if (false !== $res){
				return $sth->fetchAll(PDO::FETCH_CLASS, $class);
			}
			return [];
		}
		
		public function lastInsertedId()
		{
			return $this->dbh->lastInsertId();
		}
	}