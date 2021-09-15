<?php

require_once ("../class/Sql.php");
require_once ("../class/Semestre.php");


try {
    $listar = Semestre::getList();
    
    exit(json_encode($listar));
    
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

