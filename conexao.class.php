<?php

/**
 * 
 */
class conectPdo
{
	
	protected $conn;

	function __construct()
	{
		$this->conn = $this->conect();
		return $this->conn;	
	}
	

	public function conect(){
		try{

			$pdo = new PDO('mysql:host=localhost;dbname=testepdo','dev','8535');

			return $pdo;
			} catch (PDOException $e) {

			    echo $e->getMessage();
			    exit;
		}

	}


}

?>
