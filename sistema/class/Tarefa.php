<?php
class Prova{
    private $codigoProva;
    private $nomeProva;
    private $notaProva;
    private $dataEntregaProva;
    private $descricaoProva;
    private $codigoDisciplina;
    
    public function getCodigoProva(){
        return $this->codigoProva;
    }
    public function setCodigoProva($value){
        $this->codigoProva = $value;
    }
    
    public function getNomeProva(){
        return $this->nomeProva;
    }
    public function setNomeProva($value) {
        $this->nomeProva = $value;
    }
    
    public function getNotaProva(){
        return $this->notaProva;
    }
    public function setNotaProva($value){
        $this->notaProva = $value;
    }
    
    public function getDataEntregaProva(){
        return $this->dataEntregaProva;
    }
    public function setDataEntregaProva($value){
        $this->dataEntregaProva = $value;
    }
    
    public function getDescricaoProva(){
        return $this->descricaoProva;
    }
    public function setDescricaoProva($value){
        $this->descricaoProva = $value;
    }
    
    public function getCodigoDisciplina(){
        return $this->codigoDisciplina;
    }
    public function setCodigoDisciplina($value){
        $this->codigoDisciplina = $value;
    }
    
    public static function getList(){
        
    }
    
    public static function carregarCodigo(){
        
    }


    public function cadProva(){
        
    }
    
    public function delProva(){
        
    }
    
}

?>
