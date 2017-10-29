<?php 

try{
$pdo = new PDO("mysql:host=localhost; dbname=trabalho", "root", "" );
}
catch(PDOException $e){
    echo "Erro ".$e->getCode()." - ".$e->getMessage();
}

?>
