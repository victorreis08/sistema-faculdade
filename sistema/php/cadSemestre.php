<?php

require_once ("../class/Sql.php");
require_once ("../class/Semestre.php");

try {

    $txtSemestre = trim($_POST["txt-semestre"]);
    $txtDataInicio = $_POST["txt-dtInicio"];
    $txtDataTermino = $_POST["txt-dtTermino"];

    $semestre = new Semestre();

    $semestre->setNomeSemestre($txtSemestre);
    $semestre->setDataInicioSemestre($txtDataInicio);
    $semestre->setDataTerminoSemestre($txtDataTermino);

    $semestre->cadastroSemestre();
    
} catch (PDOException $e) {
    echo "Erro" . $e->getMessage();
}
?>
