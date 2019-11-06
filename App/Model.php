<?php
	
	
	namespace App;
	
	
	abstract class Model
	{
		const TABLE = '';
		
		public static function findAll($param = [])
		{
			$db = new Db();
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
		
		public static function getByCount($count)
		{
			return static::findAll([':count' => $count]);
		}
		
		public static function findById($id)
		{
			return static::findAll([':id' => $id]);
		}
	}