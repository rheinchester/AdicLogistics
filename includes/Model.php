<?php
include_once ('MyPDO.php');
class Model extends MyPDO {

	public static $table_fields;
	public static $table_name;
	public static $primary_key;
	public static $class_name;

	public function __construct(){
		parent::__construct();		
	}

	public static function instantiate ($record){
		$object = new static();//converts table fields to object
		foreach (static::$table_fields as $attribute) {
			if(array_key_exists($attribute, $record))
				$object->$attribute = $record[$attribute];
		}
		return $object;

	}

	public function attributes(){
		$attributes = array(); //converts table fields to array
		foreach (static::$table_fields as $field) {
			if($this->$field != '')
				$attributes[$field] = $this->$field;
		}
		return $attributes;
	}

	public function create(){
		$obj_attributes = $this->attributes();//store each key in array as object attributes...(why didn't we just use $this->attribute...in order not to call several times)
		$sql = "INSERT INTO ".static::$table_name." (";
		$sql.= join(',',array_keys($obj_attributes)).")";
		$sql.= " VALUES ('".join("','",$obj_attributes)."')";
		 // echo $sql;
		return ($this->connection->query($sql)) ? true : false;
	}
	public function update(){
	$sql = "UPDATE ".static::$table_name." SET ";
	$attributes = $this->attributes();

	foreach ($attributes as $field => $value) {
		$attribute_pairs[] = "$field = '$value'";
	}
	$primary_key = static::$primary_key;
	$sql.=join(',', $attribute_pairs);
	$sql.=" WHERE $primary_key = '{$this->$primary_key}'";
	// echo $sql;
	return  $this->connection->query($sql);
	}

	public static function find($id){
		$obj = new static();
		$sql = "SELECT * FROM ".static::$table_name;
		$sql .= " WHERE ".static::$primary_key. " = '$id'";
		$object = $obj->connection->query($sql)->fetchObject(static::$class_name);
		// echo $sql;
		return ($object) ? $object : false;
	}
	public static function findBySql($sql){
		$obj = new static ();
		$objects = $obj->connection->query($sql)->fetchAll(PDO::FETCH_CLASS, static::$class_name);//google this term
		return ($objects) ? $objects : false;
	}
	public static function all(){
		$sql = "SELECT * FROM ".static::$table_name;
		return static::findBySql($sql);
	}
	public function showTable(){
		$result = mysql_query("SHOW TABLES");
		echo($result);
	}
	public static function last(){//last can be used in any class that infherits it	without instantiation
		$sql = "SELECT * FROM " .static::$table_name." ORDER BY ";
		$sql .= static::$primary_key." DESC LIMIT 1";
		$obj = static::findBysql($sql);
		return ($obj) ? array_shift($obj): false;
	}
}
?>