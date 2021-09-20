<?php

require_once "../class/Sql.php";
require_once "../class/Semestre.php";
require_once "../class/Disciplina.php";


try {

    $codigoDisciplina = $_POST["txt-codigoDisciplina"];
    $txtDisciplina = $_POST["txt-disciplinaAlterar"];
    $slcSemestre = $_POST["slc-semestreAlterar"];
    $txaDescricao = $_POST["txa-descricaoAlterar"];

    $alterar = new Disciplina();

    $alterar->setCodigoDisciplina($codigoDisciplina);
    $alterar->setNomeDisciplina($txtDisciplina);
    $alterar->setCodigoSemestre($slcSemestre);
    $alterar->setDescricaoDiscoplina($txaDescricao);

    $alterar->altDisciplina();
} catch (PDOException $e) {
    echo '<p class="msg-fracasso">Não foi possivel realizar a alteração.</p>';
}
?>
