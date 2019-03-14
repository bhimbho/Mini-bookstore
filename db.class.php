<?php
/**
 * 
 */
class db
{
	private $server='localhost';
	private $user='root';
	private $pass='';
	private $db='book';
	private  $conn;
	
	function __construct()
	{
		try {
			$this->conn=new PDO("mysql:host=".$this->server.";dbname=".$this->db, $this->user, $this->pass);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
		
	}
	function prep($query){
		return $this->conn->prepare($query);
	}
	function dbinsert($query){
		return $this->conn->query($query);
	}
	function filter($val){
		return $this->conn->real_escape_string($val);
	}
	function getUser($id){
		$userget="SELECT * FROM user WHERE user_id=:user";
		
	}
}

?>