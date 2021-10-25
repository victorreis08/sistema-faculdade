<?php

class Semestre extends Sql {

    private $codigoSemestre;
    private $nomeSemestre;
    private $dataInicio;
    private $dataTermino;

    public function getCodigoSemestre() {
        return $this->codigoSemestre;
    }

    public function setCodigoSemestre($value) {
        $this->codigoSemestre = $value;
    }

    public function getNomeSemestre() {
        return $this->nomeSemestre;
    }

    public function setNomeSemestre($value) {
        $this->nomeSemestre = $value;
    }

    public function getDataInicioSemestre() {
        return $this->dataInicio;
    }

    public function setDataInicioSemestre($value) {
        $this->dataInicio = $value;
    }

    public function getDataTerminoSemestre() {
        return $this->dataTermino;
    }

    public function setDataTerminoSemestre($value) {
        $this->dataTermino = $value;
    }

    /* método statico */

    public static function getList() {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM semestre ORDER BY nome_semestre ASC;");


        return $results;
    }

    public static function carregarCodigo($codigo) {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM semestre WHERE codigo_semestre = :ID", array(
            ":ID" => $codigo
        ));


        return $results;
    }

    /* cadastro */

    public function cadastroSemestre() {
        $sql = new Sql();

        $results = $sql->runQuery("INSERT INTO semestre values(:CODIGO ,:NOME, :DTINICIO, :DTTERMINO)", array(
            ':CODIGO' => "",
            ':NOME' => $this->getNomeSemestre(),
            ':DTINICIO' => $this->getDataInicioSemestre(),
            ':DTTERMINO' => $this->getDataTerminoSemestre()
        ));

        if ($results->rowCount() > 0) {
            echo '<p class="msg-sucesso">Cadastrado</p>';
        } else {
            echo '<p class=""msg-fracasso">Não foi possivel realizar o cadastro</p>';
        }
    }

    public function alterarSemestre() {
        $sql = new Sql();

        $results = $sql->runQuery("UPDATE semestre SET codigo_semestre = :CODIGO, "
                . "nome_semestre = :NOME, dataInicio_semestre = :DTINICIO,"
                . "dataTermino_semestre = :DTTERMINO "
                . "WHERE codigo_semestre = :CODIGO", array(
            ':CODIGO' => $this->getCodigoSemestre(),
            ':NOME' => $this->getNomeSemestre(),
            ':DTINICIO' => $this->getDataInicioSemestre(),
            ':DTTERMINO' => $this->getDataTerminoSemestre()
        ));


        if ($results->rowCount() > 0) {

            echo '<p class="msg-sucesso">Alterado</p>';
        } else {
            echo '<p class="msg-fracasso">Não foi possivel realizar a alteração</p>';
        }
    }

    public function deletarSemestre() {
        $sql = new Sql();

        $results = $sql->runQuery("DELETE FROM semestre WHERE codigo_semestre = :CODIGO", array(
            ":CODIGO" => $this->getCodigoSemestre()
        ));

        if ($results->rowCount() > 0) {
            echo "Exclusão Realizada com sucesso";
            //zerar objetos após exclusão
            $this->getCodigoSemestre(0);
            $this->getNomeSemestre("");
            $this->getDataInicioSemestre("");
            $this->getDataTerminoSemestre("");
        } else {
            echo "Não foi possivel excluir o registro";
        }
    }

}

?>
