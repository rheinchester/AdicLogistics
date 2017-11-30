<?php
	include_once ('config.php');
	class MyPDO {
		protected $connection;

		function __construct(){
			$this->open_connection();
		} 

		protected function open_connection (){
			try {
				$this->connection = new PDO (DSN,DB_USER,DB_PASSWORD);
			} catch (PDOException $e){
				echo $e->getMessage();
			}
		}	

		protected function close_connection(){
			$this->connection = null;
		}
	}
?>