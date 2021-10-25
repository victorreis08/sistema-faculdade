<?php

require_once ("../class/Sql.php");
require_once ("../class/Semestre.php");
require_once ("../class/Disciplina.php");
require_once ("../class/Tarefa.php");

try {

    $codigo = $_GET["id"];

    $excluir = new Tarefa($codigo, "", "", "", "", "", "");

    $excluir->delTarefa();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

