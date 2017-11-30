<?php 

try{
$pdo = new PDO("mysql:host=localhost; dbname=trabalho", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8") );
}
catch(PDOException $e){
    echo "Erro ".$e->getCode()." - ".$e->getMessage();
}

?>
