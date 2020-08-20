<?php

class DbConfig 
{	
	private $_host = 'localhost';
	private $_username = "asmaoasi";
	private $_password = "ih8Rh5#W*r46YL";
	private $_database = "asmaoasi_pubg";
	
	protected $connection;
	
	public function __construct()
	{
		if (!isset($this->connection)) {
			
			$this->connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
			
			if (!$this->connection) {
				echo 'Cannot connect to database server';
				exit;
			}			
		}	
		
		return $this->connection;
	}
}


?>