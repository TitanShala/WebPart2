<?php

 class DbConnection{
	private $servername='DESKTOP-8A4MQKL';
	private $Login='adminGroup';
	private $password='admin';	
	private $DatabaseName='WebProject';


	public function getConnection(){
		try{	
		$connection = new PDO("sqlsrv:Server=$this->servername;Database=$this->DatabaseName", "adminGroup", "admin");
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo $e->getMessage();
			return null ;
		}
		return $connection;
	}
	}
