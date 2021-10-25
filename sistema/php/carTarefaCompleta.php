<?php

require_once ("../class/Sql.php");
require_once ("../class/Semestre.php");
require_once ("../class/Disciplina.php");
require_once ("../class/Tarefa.php");

try {

    $carregar = Tarefa::carTarefaCompleta();

    exit(json_encode($carregar));
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

