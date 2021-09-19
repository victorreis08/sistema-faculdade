<?php

require_once ("../class/Sql.php");
require_once ("../class/Disciplina.php");

try {
    $codigoSemestre = $_GET["id"];

    $carregar = Disciplina::carregarCodigo($codigoSemestre);

    exit(json_encode($carregar));
    
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>