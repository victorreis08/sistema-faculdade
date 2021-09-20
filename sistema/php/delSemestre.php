<?php

require_once ("../class/Sql.php");
require_once ("../class/Semestre.php");

try{

$codigo = $_GET["id"];

$deletar = new Semestre();


$deletar->setCodigoSemestre($codigo);

$deletar->deletarSemestre();


} catch (PDOException $e){
   echo 'Não foi possivel realizar a exclusão.';
}

?>

