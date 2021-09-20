<?php

require_once ("../class/Sql.php");
require_once "../class/Semestre.php";
require_once ("../class/Disciplina.php");

try {
    $codigoSemestre = $_GET["id"];

    $carregar = Disciplina::carregarCodigo($codigoSemestre);

    exit(json_encode($carregar));
    
} catch (PDOException $e) {
    echo '<p class="msg-fracasso">Erro não foi possivel carregar os campos</p>';
}
?>