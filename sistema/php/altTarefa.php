<?php

require_once ("../class/Sql.php");
require_once ("../class/Semestre.php");
require_once ("../class/Disciplina.php");
require_once ("../class/Tarefa.php");

try {
    $codigo = $_POST["txt-codigoTarefaAlterar"];
    $nomeTarefa = $_POST["txt-tarefaAlterar"];
    $tipoTarefa = $_POST["slc-tipoTarefaAlterar"];
    $statusTarefa = $_POST["slc-statusTarefaAlterar"];
    $codigoDisciplina = $_POST["slc-disciplinaAlterar"];
    $data = $_POST["txt-dataAlterar"];
    $descricao = $_POST["txa-descricaoAlterar"];

    $alterar = new Tarefa($codigo, $nomeTarefa, $tipoTarefa, $statusTarefa, $codigoDisciplina, $data, $descricao);
    $alterar->altTarefa();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
