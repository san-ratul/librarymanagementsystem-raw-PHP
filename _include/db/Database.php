<?php  
	
	
	class Database
	{

		private $dbName   = "elibrary";
		private $hostName = "localhost";
		private $userdb   = "root";
		private $passdb   = "";
		public  $pdo;
		
		public function __construct()
		{
			if(!isset($this->pdo)){
				try {
					$link = new PDO("mysql:host=".$this->hostName.";dbname=". $this->dbName, $this->userdb, $this->passdb);
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$link->exec("SET CHARACTER SET utf8");
					$this->pdo = $link;

				} catch (PDOException $e) {
					die("Failed to connect with database ".$e->getMessage());
				}
			}
		}
	}


?>