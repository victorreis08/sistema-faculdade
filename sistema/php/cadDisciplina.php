<?php

require_once ("../class/Sql.php");
require_once ("../class/Disciplina.php");

try {

    $txtDisciplina = trim($_POST["txt-disciplina"]);
    $slcSemestre = $_POST["slc-semestre"];
    $txaDescricao = trim($_POST["txa-descricao"]);
    
    if($txtDisciplina == ""){
        
    }


    $disciplina = new Disciplina();

    $disciplina->setNomeDisciplina($txtDisciplina);
    $disciplina->setDescricaoDiscoplina($txaDescricao);
    $disciplina->setCodigoSemestre($slcSemestre);

    $disciplina->cadDisciplina();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
