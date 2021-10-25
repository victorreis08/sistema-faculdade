<?php

class Tarefa extends Disciplina {

    private $codigoTarefa;
    private $nomeTarefa;
    private $tipoTarefa;
    private $statusTarefa;
    private $dataEntregaTarefa;
    private $descricaoTarefa;

    public function getCodigoTarefa() {
        return $this->codigoTarefa;
    }

    public function setCodigoTarefa($value) {
        $this->codigoTarefa = $value;
    }

    public function getNomeTarefa() {
        return $this->nomeTarefa;
    }

    public function setNomeTarefa($value) {
        $this->nomeTarefa = $value;
    }

    public function getTipoTarefa() {
        return $this->tipoTarefa;
    }

    public function setTipoTarefa($value) {
        $this->tipoTarefa = $value;
    }

    public function getStatusTarefa() {
        return $this->statusTarefa;
    }

    public function setStatusTarefas($value) {
        $this->statusTarefa = $value;
    }

    public function getDataEntregaTarefa() {
        return $this->dataEntregaTarefa;
    }

    public function setDataEntregaTarefa($value) {
        $this->dataEntregaTarefa = $value;
    }

    public function getDescricaoTarefa() {
        return $this->descricaoTarefa;
    }

    public function setDescricaoTarefa($value) {
        $this->descricaoTarefa = $value;
    }

    public function __construct($codigo, $nomeTarefa, $tipoTarefa, $statusTarefa, $codigoDisciplina, $data, $descricao) {
        $this->setCodigoTarefa($codigo);
        $this->setNomeTarefa($nomeTarefa);
        $this->setTipoTarefa($tipoTarefa);
        $this->setDescricaoTarefa($descricao);
        $this->setStatusTarefas($statusTarefa);
        $this->setDataEntregaTarefa($data);
        $this->setCodigoDisciplina($codigoDisciplina);
    }

    public static function carTarefaPendente() {
        $sql = new Sql();
        $results = $sql->select("SELECT tarefa.*, disciplina.nome_disciplina "
                . "FROM tarefa INNER JOIN disciplina ON "
                . "tarefa.codigo_disciplina = disciplina.codigo_disciplina "
                . "where status_tarefa='P' ORDER BY nome_disciplina ASC");

        return $results;
    }

    public static function carTarefaCompleta() {
        $sql = new Sql();
        $results = $sql->select("SELECT tarefa.*, disciplina.nome_disciplina "
                . "FROM tarefa INNER JOIN disciplina ON "
                . "tarefa.codigo_disciplina = disciplina.codigo_disciplina "
                . "where status_tarefa='C' ORDER BY nome_disciplina ASC");

        return $results;
    }

    public static function carregarCodigo($codigo) {
        $sql = new Sql();

        $results = $sql->select("SELECT tarefa.*, disciplina.nome_disciplina "
                . "FROM tarefa INNER JOIN disciplina ON "
                . "tarefa.codigo_disciplina = disciplina.codigo_disciplina "
                . "where codigo_tarefa=" . $codigo);

        return $results;
    }

    public function cadTarefa() {
        $sql = new Sql();

        $results = $sql->runQuery("INSERT INTO tarefa VALUES(:CODIGO,:NOME,:TIPO,:DESCRICAO,:STATUS,:DATA,:DISCIPLINA)", array(
            ":CODIGO" => "",
            ":NOME" => $this->getNomeTarefa(),
            ":TIPO" => $this->getTipoTarefa(),
            ":DESCRICAO" => $this->getDescricaoTarefa(),
            ":STATUS" => $this->getStatusTarefa(),
            ":DATA" => $this->getDataEntregaTarefa(),
            ":DISCIPLINA" => $this->getCodigoDiscplina()
        ));

        if ($results->rowCount() > 0) {
            echo '<p class="msg-sucesso">Cadastrado</p>';
        } else {
            echo '<p class="msg-fracasso">Não foi possivel realizar o cadastro</p>';
        }
    }

    public function altTarefa() {
        $sql = new Sql();
        $results = $sql->runQuery("UPDATE tarefa set codigo_tarefa = :CODIGO, nome_tarefa = :NOME, tipo_tarefa = :TIPO, descricao_tarefa = :DESCRICAO, status_tarefa = :STATUS, dataEntrega_tarefa = :DATA, codigo_disciplina = :DISCIPLINA WHERE codigo_tarefa = :CODIGO", array(
            ":CODIGO" => $this->getCodigoTarefa(),
            ":NOME" => $this->getNomeTarefa(),
            ":TIPO" => $this->getTipoTarefa(),
            ":DESCRICAO" => $this->getDescricaoTarefa(),
            ":STATUS" => $this->getStatusTarefa(),
            ":DATA" => $this->getDataEntregaTarefa(),
            ":DISCIPLINA" => $this->getCodigoDiscplina()
        ));

        if ($results->rowCount() > 0) {
            echo '<p class="msg-sucesso">Alterado</p>';
        } else {
            echo '<p class="msg-fracasso">Não foi possivel realizar a alteração</p>';
        }
    }

    public function delTarefa() {
        $sql = new Sql();

        $results = $sql->runQuery("DELETE FROM tarefa where codigo_tarefa=:CODIGO", array(
            ":CODIGO" => $this->getCodigoTarefa()
        ));

        if ($results->rowCount() > 0) {
            echo "Exclusão Realizada com sucesso";
            $this->getCodigoTarefa(0);
            $this->getNomeTarefa("");
            $this->getDescricaoTarefa("");
            $this->getCodigoDiscplina(0);
        } else {
            echo "Não foi possivel excluir o registro";
        }
    }

}

?>
