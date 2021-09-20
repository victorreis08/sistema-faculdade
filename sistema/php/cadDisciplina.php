<?php

require_once ("../class/Sql.php");
require_once "../class/Semestre.php";
require_once ("../class/Disciplina.php");

try {

    $txtDisciplina = trim($_POST["txt-disciplina"]);
    $slcSemestre = $_POST["slc-semestre"];
    $txaDescricao = trim($_POST["txa-descricao"]);
    
    $disciplina = new Disciplina();

    $disciplina->setNomeDisciplina($txtDisciplina);
    $disciplina->setDescricaoDiscoplina($txaDescricao);
    $disciplina->setCodigoSemestre($slcSemestre);

    $disciplina->cadDisciplina();
} catch (PDOException $e) {
    echo '<p class="msg-fracasso">Não foi possivel realizar o cadastro.</p>';
}
?>
