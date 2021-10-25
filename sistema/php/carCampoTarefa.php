<?php

require_once ("../class/Sql.php");
require_once ("../class/Semestre.php");
require_once ("../class/Disciplina.php");
require_once ("../class/Tarefa.php");

$codigo = $_GET['id'];

try {
    $carCampo = Tarefa::carregarCodigo($codigo);

    exit(json_encode($carCampo));
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
