<?php

class PontuacaoModel extends Crud {

    protected $tabela = 'pontuacao';
    private $id_Pontuacao;
    private $conteudo;
    private $id_Agente;
    private $id_Publicacao;
    function getId_Pontuacao() {
        return $this->id_Pontuacao;
    }

    function getConteudo() {
        return $this->conteudo;
    }

    function getId_Agente() {
        return $this->id_Agente;
    }

    function getId_Publicacao() {
        return $this->id_Publicacao;
    }

    function setId_Pontuacao($id_Pontuacao) {
        $this->id_Pontuacao = $id_Pontuacao;
    }

    function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    function setId_Agente($id_Agente) {
        $this->id_Agente = $id_Agente;
    }

    function setId_Publicacao($id_Publicacao) {
        $this->id_Publicacao = $id_Publicacao;
    }

        public function cadastrar() {
        $sql = "INSERT INTO $this->tabela (conteudo,id_Agente,id_Publicacao) VALUES (:conteudo,:id_Agente,:id_Publicacao)";
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':descricao', $this->conteudo);
        $stmt->bindParam(':preco', $this->id_Agente);
        $stmt->bindParam(':autor', $this->id_Publicacao);
        return $stmt->execute();
    }

    public function editar($id) {
        
    }

}
