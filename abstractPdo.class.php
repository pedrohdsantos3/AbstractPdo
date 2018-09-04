<?php

/**
 * 
 */

include_once __DIR__."/conexao.class.php";

class AbstractPdo extends conectPdo
{
	
	public function makeSqlStateConsulta($sql, $keys, $alias, $operator=null, $especialOrder = null){
        $where = "";
        foreach ($keys as $key => $k) {

            if($operator == null){
                $op = " = ";
            }else{
                $op = $operator[$key];
            }
            if($k != null){
                $where .= $alias[$key].'.'.$key.' '.$op.' :'.$key.' , ';
            }

        }
        $where = implode('AND', explode(',', $where));
        $where = ' '.substr($where, 0, -5);
        $stmt = $this->conn->prepare($sql.$where.$especialOrder);
        foreach ($keys as $key => $v) {
            if($v != null) {
                $stmt->bindValue(':' . $key, $v, PDO::PARAM_STR);
                //$teste = ':' . $key . '  ' . $v;
            }
        }
        //return $sql.$where;
        return $stmt;
    }

//    public function makeInsertState($table, $pk = null, $keys){
//
//        foreach ($keys as $key => $k) {
//
//
//
//        }
//
//    }
}


?>