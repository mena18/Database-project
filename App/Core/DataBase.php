<?php


class DataBase{
	public static $conn;
	public static $class_name;
	public static $table_name;
	public static $fill;

	public static function query_fetch_all($sql,$class_name = 'none'){
		if($class_name == 'none'){$class_name = static::$class_name;}

		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_CLASS, $class_name);
	}

	public static function query_fetch($sql,$class_name = 'none'){
		if($class_name == 'none'){$class_name = static::$class_name;}

		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
		$stmt = $stmt->fetchAll(PDO::FETCH_CLASS, $class_name);
		return $stmt[0];
	}

	public static function get_one($sql){
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetch();
	}

	public static function get_array($sql){
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

	public static function query($sql){
		$stmt = self::$conn->prepare($sql);
		$stmt->execute();
	}

	public static function get_all(){
		$tab_name = static::$table_name;
		$sql = "SELECT * FROM $tab_name";
		return self::query_fetch_all($sql);
	}

	public static function get($id){
		$tab_name = static::$table_name;
		$sql = "SELECT * FROM $tab_name WHERE id = '$id' ";
		return self::query_fetch($sql);
	}

	public static function where($arr){
		$wh = [];
		foreach ($arr as $key => $value) {
			$wh[] = $key . " = '" . "$value' ";
		}
		$wh = implode(" AND ",$wh);
		$tb_name = static::$table_name;
		$sql = "SELECT * FROM $tb_name WHERE $wh ;";
		return self::query_fetch_all($sql);
	}

	public static function search($arr){
		$wh = [];
		foreach ($arr as $key => $value) {
			$wh[] = "$key LIKE '%$value%' ";
		}
		$wh = implode(" OR ",$wh);
		$tb_name = static::$table_name;
		$sql = "SELECT * FROM $tb_name WHERE $wh ;";
		return self::query_fetch_all($sql);
	}


	public static function count(){
		$tb_name = static::$table_name;
		$var = self::get_one("SELECT count(id) FROM $tb_name;");
		return $var[0];
	}



	public function save(){
		$data = "(".implode(",",static::$fill).")";
		$arr_2 = [];
		foreach (static::$fill as $value) {
			$arr_2[] = "'".$this->$value."'";
		}
		$values =  "(".implode(",",$arr_2).")";

		$tb_name = static::$table_name;
		$sql = "INSERT INTO $tb_name" . $data . " VALUES " . $values ;

		self::query($sql);
	}

	public function update(){
		$arr = [];
		foreach (static::$fill as $value) {
			$arr[] = $value ." = '".$this->$value."'";
		}
		$tb_name = static::$table_name;
		$id = $this->id;
		$sql = "UPDATE $tb_name SET " . implode(",",$arr) . " WHERE id = '$id'; ";

		echo $sql;
		self::query($sql);
	}

	public function delete(){
		$tb_name = static::$table_name;
		$id = $this->id;
		$sql = "DELETE  FROM $tb_name WHERE id = '$id' ;";

		self::query($sql);
	}

	public function get_last(){
			$tb_name = static::$table_name;
			$sql = "SELECT MAX(id) FROM $tb_name";
			$var  = self::get_one($sql);
			return $var[0];
	}





}
