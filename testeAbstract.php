<?php

include_once './abstractPdo.class.php';

$pdo = new AbstractPdo();

$sql = "SELECT c.* FROM customer c";

$key = array("WORKING_AREA" => 'London');
$operator = array("WORKING_AREA" => '=');
$alias  = array('WORKING_AREA' => 'c' );
$query = $pdo->makeSqlState($sql, $key, $alias, null, 'ORDER BY CUST_CODE asc');

$query->execute();
$lista = $query->fetchAll(PDO::FETCH_ASSOC);

print_r($lista);


?>