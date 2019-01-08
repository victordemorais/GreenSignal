<?php 
include_once("config.php");
Class Database{
		public $host = HOST;
		public $user = USER;
		public $password = PASS;
		public $dbname = DB;
		
		public $connect;
	
	public function __construct(){
		$this->connectDB();
	}
	private function connectDB() {
		
		$this->connect = new mysqli($this->host, $this->user, $this->password, $this->dbname);
		$this->connect->set_charset("utf8");
		if(!$this->connect){
			echo "Erro ao connectar no banco de dados err: ".$this->connect;
			return false;
		}
			
	}
	
	public function select($query){
		$result = $this->connect->query($query) or die($this->connect->error.__LINE__);
		if($result->num_rows > 0 ){
				return $result;
		}else{
				return false;
		}
	}
	public function insert($query){
		$insertRow = $this->connect->query($query) or die($this->connect->error.__LINE__);
		if($insertRow){
				header("location: index.php");
		}else{
				header("location: create.php");
		}
	}
	
	public function delete($query){
		$deleteRow = $this->connect->query($query) or die($this->connect->error.__LINE__);
		if($deleteRow){
				header("location: index.php");
				exit();
		}else{
				header("location: create.php");
		}
	}
}