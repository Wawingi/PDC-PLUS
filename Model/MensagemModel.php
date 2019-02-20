<?php

class MensagemModel extends Crud {

    protected $tabela = 'mensagem';
    private $id_Mensagem;
    private $conteudo;
    private $data;
    private $estado;
    private $id_Agente1;
    private $id_Agente2;
    function getId_Mensagem() {
        return $this->id_Mensagem;
    }

    function getConteudo() {
        return $this->conteudo;
    }

    function getData() {
        return $this->data;
    }

    function getEstado() {
        return $this->estado;
    }

    function getId_Agente1() {
        return $this->id_Agente1;
    }

    function getId_Agente2() {
        return $this->id_Agente2;
    }

    function setId_Mensagem($id_Mensagem) {
        $this->id_Mensagem = $id_Mensagem;
    }

    function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setId_Agente1($id_Agente1) {
        $this->id_Agente1 = $id_Agente1;
    }

    function setId_Agente2($id_Agente2) {
        $this->id_Agente2 = $id_Agente2;
    }

    
    public function cadastrar() {
        $sql = "INSERT INTO $this->tabela (conteudo,data,estado,id_Agente1,id_Agente1) VALUES (:conteudo,:data,:estado,:id_Agente1,:id_Agente2)";
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':conteudo', $this->conteudo);
        $stmt->bindParam(':data', $this->data);
        $stmt->bindParam(':estado', $this->estado);
        $stmt->bindParam(':id_Agente1', $this->id_Agente1);
        $stmt->bindParam(':id_Agente', $this->id_Agente2);
        return $stmt->execute();
    }

    public function editar($id) {
        
    }

}
