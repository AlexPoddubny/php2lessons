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
			if ($db->execute($sql, $values)){
				$this->id = $db->lastInsertedId();
			};
		}
		
		public function update()
		{
			$columns = [];
			$values = [];
			$sql = 'UPDATE ' . static::TABLE . ' SET ';
			foreach ($this as $k => $v){
				$columns[] = $k;
				$values[':' . $k] = trim($v);
				if ('id' == $k){
					continue;
				}
				$sql .= $k . '=:' . $k . ',';
			}
			$sql = substr($sql, 0, -1) . ' WHERE id=:id';
			$db = Db::instance();
			$db->execute($sql, $values);
		}
		
		public function delete()
		{
			if ($this->isNew()){
				echo 'No id=' . $this->id;
				return false;
			}
			$sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';
			$value = [];
			$value[':id'] = $this->id;
			$db = Db::instance();
			return $db->execute($sql, $value);
		}
		
		public function save()
		{
			if ($this->isNew()){
				$this->insert();
			} else {
				$this->update();
			}
		}
		
		public static function getByCount(Int $count)
		{
			$query = 'SELECT * FROM ' . static::TABLE .
				' ORDER BY id DESC LIMIT ' . $count;
			$db = Db::instance();
			return $db->query(
				$query,
				static::class,
				[]
			);
		}
		
		public static function findById($id)
		{
			$query = 'SELECT * FROM ' . static::TABLE . ' WHERE id = ' . $id;
			$db = Db::instance();
			$res = $db->query(
				$query,
				static::class,
				[]
			);
			if ($res) {
				return $res[0];
			}
			return false;
		}
	}