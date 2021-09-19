<?php
require_once ("../class/Sql.php");
require_once ("../class/Disciplina.php");

$codigoDisciplina = $_GET["id"];


$deletar = new Disciplina();

$deletar->setCodigoDisciplina($codigoDisciplina);

$deletar->delDisciplina();

?>