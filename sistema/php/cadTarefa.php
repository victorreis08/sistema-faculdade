<?php

require_once ("../class/Sql.php");
require_once ("../class/Semestre.php");
require_once ("../class/Disciplina.php");
require_once ("../class/Tarefa.php");

try {
    $nomeTarefa = $_POST["txt-tarefa"];
    $tipoTarefa = $_POST["slc-tipoTarefa"];
    $statusTarefa = $_POST["slc-status"];
    $codigoDisciplina = $_POST["slc-disciplina"];
    $data = $_POST["txt-data"];
    $descricao = $_POST["txa-descricao"];

    $cadastrar = new Tarefa("",$nomeTarefa, $tipoTarefa, $statusTarefa, $codigoDisciplina, $data, $descricao);
    $cadastrar->cadTarefa();
    
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>