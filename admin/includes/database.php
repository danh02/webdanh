<?php  
class database{

	//DB Params
	private $dns = "mysql:host=bhpmf8icnxjnfrniasw7-mysql.services.clever-cloud.com;dbname=bhpmf8icnxjnfrniasw7";
	private $username = "untedwm7bzka0oes";
	private $password = "yHafN9hHTbBRktxATK6f";
	private $conn;
	//DB Connect
	public function connect(){
		$this->conn = null;
		try{
			$this->conn = new PDO($this->dns,$this->username,$this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}catch(PDOException $e){
			echo "Connection failed: ".$e->getMessage();
		}

		return $this->conn;
	}
}
?>

