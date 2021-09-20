<?php

require_once ("../class/Sql.php");
require_once ("../class/Semestre.php");

try {

    $codigo = $_POST["txt-codigoSemestre"];
    $txtSemestre = trim($_POST["txt-semestreAlterar"]);
    $txtDtInicio = $_POST["txt-dtInicioAlterar"];
    $txtDtTermino = $_POST["txt-dtTerminoAlterar"];

    $alterar = new Semestre();

    $alterar->setCodigoSemestre($codigo);
    $alterar->setNomeSemestre($txtSemestre);
    $alterar->setDataInicioSemestre($txtDtInicio);
    $alterar->setDataTerminoSemestre($txtDtTermino);

    $alterar->alterarSemestre();
} catch (PDOException $e) {
    echo '<p class="msg-fracasso">Não foi possivel realizar a alteração.</p>';
}
?>


