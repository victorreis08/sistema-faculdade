<?php

require_once ("../class/Sql.php");
require_once ("../class/Disciplina.php");
try {
    $disciplina = Disciplina::getList();

    exit(json_encode($disciplina));
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

