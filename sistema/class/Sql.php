<?php

//herda os métodos PDO, prepare, query, etc
class Sql extends PDO {

    private $conn;

    //metodo para conecatar com o banco de dados
    public function __construct() {
        $this->conn = new PDO("mysql:host=localhost;dbname=bd_faculdade", "root", "");
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->exec("set names utf8");
    }

    //métodos para executar no banco de dados


    /* O método setParams tem o objetivo de definir os valores dos parâmetros que passamos para a query

      Por exemplo: SELECT * FROM tb_usuarios WHERE idusuario = :USUARIO

      O setParams irá definir o valor de :USUARIO e de qualquer outro parâmetro

      O método query, como o nome já diz, é responsável por executar alguma query ou comando no banco de dados, qualquer que seja */

    private function setParams($statment, $parameter = array()) {
        foreach ($parameter as $key => $value) {
            $this->setParam($statment, $key, $value);
        }
    }

    private function setParam($statment, $key, $value) {
        $statment->bindParam($key, $value);
    }

    public function runQuery($RawQuery, $params = array()) {
        $stmt = $this->conn->prepare($RawQuery);
        $this->setParams($stmt, $params);
        $stmt->execute();
        return $stmt;
    }

    public function select($rawQuery, $params = array()): array {
        $stmt = $this->runQuery($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>
