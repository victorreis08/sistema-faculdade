<?php
require_once ("../class/Sql.php");
require_once ("../class/Semestre.php");

try {
    $codigo = $_GET["id"];

    $carregar = Semestre::carregarCodigo($codigo);
    
    
    exit(json_encode($carregar));
           
} catch (PDOException $e) {
    echo '<p class="msg-fracasso">Erro não foi possivel carregar os campos</p>';
}


?>






