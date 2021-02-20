<?php

class Databases{
	public $con;

	public function __construct(){
		$this->con = mysqli_connect("localhost", "root", "root", "blog");
		if (!$this->con) {
			echo 'Database Connection Error '.mysqli_connect_error($this->con);
		}
	}

	public function insert($table_name, $data){
		$sql = "INSERT INTO ".$table_name." (".implode(",", array_keys($data)).", CreatedAt, UpdatedAt) VALUES ('".implode ("','", array_values($data))."',now(),now())";

		if (mysqli_query($this->con, $sql)) {
			return true;
		}else{
			echo mysqli_error($this->con);
		}
	}

	public function select($table_name){
		$array = array();
		$sql = "SELECT * FROM ".$table_name."";

		$result = mysqli_query($this->con, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$array[] = $row;
		}
		return $array;
	}

	public function update($table_name, $title_edit_txt, $autor_edit_txt, $message_edit_txt, $id_txt){
		$sql = "UPDATE ".$table_name." SET post_title='".$title_edit_txt."', post_autor='".$autor_edit_txt."', post_content='".$message_edit_txt."', UpdatedAt=now() WHERE id=".$id_txt."";

		if (mysqli_query($this->con, $sql) == TRUE) {
			return true;
		}else{
			echo mysqli_error($this->con); 
		}
	}

	public function delete($table_name, $id_txt){
		$sql = "DELETE FROM ".$table_name." WHERE id='".$id_txt."'";

		if (mysqli_query($this->con, $sql) == TRUE) {
			return true;
		}else{
			echo mysqli_error($this->con); 
		}
	}

}
?>