<?php
	
	
	namespace App;
	
	
	abstract class Model
	{
		const TABLE = '';
		
		public $id;
		
		public static function findAll($param = [])
		{
			$db = Db::instance();
			$query = 'SELECT * FROM ' . static::TABLE;
			if ($param){
				if (isset($param[':id'])){
					$query .= ' WHERE id = :id';
				}
				if (isset($param[':count'])){
					$query .= ' LIMIT ' . $param[':count'];
					unset($param[':count']);
				}
			}
			return $db->query(
				$query,
				static::class,
				$param
			);
		}
		
		public function isNew()
		{
			return empty($this->id);
		}
		
		public function insert()
		{
			if (!$this->isNew()){
				return;
			}
			$columns = [];
			$values = [];
			foreach ($this as $k => $v){
				if ('id' == $k){
					continue;
				}
				$columns[] = $k;
				$values[':' . $k] = $v;
			}
			$sql = 'INSERT INTO ' . static::TABLE . ' (' .
				implode(',', $columns) . ')
				VALUE (' . implode(',', array_keys($values)) . ')';
			$db = Db::instance();
			$db->execute($sql, $values);
		}
		
		public static function getByCount(Int $count)
		{
			return static::findAll([':count' => $count]);
		}
		
		public static function findById(Int $id)
		{
			return static::findAll([':id' => $id]);
		}
	}