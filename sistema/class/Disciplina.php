<?php

class Disciplina {

    private $codigoDisciplina;
    private $nomeDisciplina;
    private $descricaoDisciplina;
    private $codigoSemestre;

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

    public function getCodigoSemestre() {
        return $this->codigoSemestre;
    }

    public function setCodigoSemestre($value) {
        $this->codigoSemestre = $value;
    }

    public static function getList() {
        
    }

    public static function carregarCodigo($codigo) {
        
    }

    public function cadDisciplina() {
        $sql = new Sql();

        $results = $sql->query("INSERT INTO disciplina VALUES(:CODIGO, :NOME, "
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
        
    }

    public function delDisciplina() {
        
    }

}

?>