<?php

include_once 'DbConfig.php';

/**
 * 
 */
class crud extends DbConfig
{
	var $number = 0;
	
	function __construct()
	{
		parent::__construct();
	}

	public function getData($query)
	{		
		$result = $this->connection->query($query);
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}

	public function execute($query) 
	{
		$result = $this->connection->query($query);
		
		if ($result == false) {
			echo 'Error: cannot execute the command';
			return false;
		} else {
			return true;
		}		
	}

	public function delete($id, $table) 
	{ 
		$query = "DELETE FROM $table WHERE id = $id";
		
		$result = $this->connection->query($query);
	
		if ($result == false) {
			echo 'Error: cannot delete id ' . $id . ' from table ' . $table;
			return false;
		} else {
			return true;
		}
	}

	public function check_existence($table, $attribute, $value){			
		$query = "SELECT * FROM $table WHERE $attribute = '$value' ";
		$result = $this->connection->query($query);

			if ($result) {				
				$num_row = $result->num_rows;
				if ($num_row == 0) {
					return true;
				}
				else{
					return false;
				}			

			}
			else{
				echo "ERROR";
			}	

		
	}

	public function checkPrivilege($value)
	{
		$query = "SELECT * FROM `admin_login` WHERE username = '$value'";
		$result = $this->connection->query($query);
		if ($result) {
			$row = $result->fetch_assoc();
			$priority = $row['privilege'];
			return $priority;
		}
		else{
			return 0;
		}
	}
	
	public function escape_string($value)
	{
		return $this->connection->real_escape_string($value);
	}

	
}


?>