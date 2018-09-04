<?php

/**
 * 
 */

include_once __DIR__."/conexao.class.php";

class AbstractPdo extends conectPdo
{
	
	public function makeSqlState($sql, $keys, $alias, $operator=null, $especialOrder = null){

		$where = "";
		foreach ($keys as $key => $k) {
			if($operator == null){
				$op = " = ";
			}else{
				$op = $operator[$key];
			}
			$where .= $alias[$key].'.'.$key.' '.$op.' :'.$keys[$key].' , ';
		}

		$where = implode('AND', explode(',', $where));
		$where = ' WHERE '.substr($where, 0, -4);

		$stmt = $this->conn->prepare($sql.$where.$especialOrder);

		foreach ($keys as $key => $v) {
			$stmt->bindParam(':'.$keys[$key], $v, PDO::PARAM_STR);
		}

		return $stmt;


	}
}


?>