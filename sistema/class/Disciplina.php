<?php

class Disciplina extends Semestre {

    private $codigoDisciplina;
    private $nomeDisciplina;
    private $descricaoDisciplina;

    public function getCodigoDiscplina() {
        return $this->codigoDisciplina;
    }

    public function setCodigoDisciplina($value) {
        $this->codigoDisciplina = $value;
    }

    public function getNomeDisciplina() {
        return $this->nomeDisciplina;
    }

    public function setNomeDisciplina($value) {
        $this->nomeDisciplina = $value;
    }

    public function getDescricaoDisciplina() {
        return $this->descricaoDisciplina;
    }

    public function setDescricaoDiscoplina($value) {
        $this->descricaoDisciplina = $value;
    }

    public static function getList() {

        $sql = new Sql();

        $result = $sql->select("SELECT disciplina.*, semestre.nome_semestre "
                . "FROM disciplina INNER JOIN semestre ON "
                . "disciplina.codigo_semestre = semestre.codigo_semestre "
                . "ORDER BY nome_semestre ASC;");

        return $result;
    }

    public static function carregarCodigo($codigo) {
        $sql = new Sql();
        $results = $sql->select("SELECT disciplina.*, semestre.nome_semestre "
                . "FROM disciplina INNER JOIN semestre ON disciplina.codigo_semestre"
                . " = semestre.codigo_semestre where codigo_disciplina =" . $codigo);

        return $results;
    }

    public function cadDisciplina() {
        $sql = new Sql();

        $results = $sql->runQuery("INSERT INTO disciplina VALUES(:CODIGO, :NOME, "
                . ":DESCRICAO, :CODIGOSEMESTRE)", array(
            ":CODIGO" => "",
            ":NOME" => $this->getNomeDisciplina(),
            ":DESCRICAO" => $this->getDescricaoDisciplina(),
            ":CODIGOSEMESTRE" => $this->getCodigoSemestre()
        ));

        if ($results->rowCount() > 0) {
            echo '<p class="msg-sucesso">Cadastrado</p>';
        } else {
            echo '<p class="msg-fracasso">Não foi possivel realizar o cadastro</p>';
        }
    }

    public function altDisciplina() {
        $sql = new Sql();

        $results = $sql->runQuery("UPDATE disciplina SET codigo_disciplina = :CODIGO,"
                . " nome_disciplina = :NOME, codigo_semestre = :SEMESTRE, "
                . "descricao_disciplina = :DESCRICAO WHERE codigo_disciplina = :CODIGO", array(
            ":CODIGO" => $this->getCodigoDiscplina(),
            ":NOME" => $this->getNomeDisciplina(),
            ":SEMESTRE" => $this->getCodigoSemestre(),
            ":DESCRICAO" => $this->getDescricaoDisciplina()
        ));

        if ($results->rowCount() > 0) {
            echo '<p class="msg-sucesso">Alterado</p>';
        } else {
            echo '<p class="msg-fracasso">Não foi possivel realizar a alteração</p>';
        }
    }

    public function delDisciplina() {
        $sql = new Sql();

        $results = $sql->runQuery("DELETE FROM disciplina WHERE codigo_disciplina= :CODIGO", array(
            ":CODIGO" => $this->getCodigoDiscplina()
        ));

        if ($results->rowCount() > 0) {
            echo "Exclusão Realizada com sucesso";
            $this->getCodigoDiscplina("");
            $this->getNomeDisciplina("");
            $this->getCodigoSemestre("");
            $this->getDescricaoDisciplina("");
        } else {
            echo "Não foi possivel excluir o registro";
        }
    }

}

?>