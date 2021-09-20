<?php
require_once ("../class/Sql.php");
require_once "../class/Semestre.php";
require_once ("../class/Disciplina.php");

try{

$codigoDisciplina = $_GET["id"];

$deletar = new Disciplina();

$deletar->setCodigoDisciplina($codigoDisciplina);

$deletar->delDisciplina();
}catch(PDOException $e){
    echo 'Não foi possivel realizar a exclusão.';
}

?>