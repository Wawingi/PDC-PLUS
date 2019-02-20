<?php

class ProdutoModel extends Crud {

    protected $tabela = 'produto';
    private $id_Produto;
    private $descricao;
    private $preco;
    private $autor;
    private $conteudo;
    private $nome;
    private $id_Agente;
    function getId_Produto() {
        return $this->id_Produto;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getPreco() {
        return $this->preco;
    }

    function getAutor() {
        return $this->autor;
    }

    function getConteudo() {
        return $this->conteudo;
    }

    function getNome() {
        return $this->nome;
    }

    function getId_Agente() {
        return $this->id_Agente;
    }

    function setId_Produto($id_Produto) {
        $this->id_Produto = $id_Produto;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setPreco($preco) {
        $this->preco = $preco;
    }

    function setAutor($autor) {
        $this->autor = $autor;
    }

    function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setId_Agente($id_Agente) {
        $this->id_Agente = $id_Agente;
    }

       public function cadastrar() {
        $sql = "INSERT INTO $this->tabela (descricao,preco,autor,tipo,conteudo,nome,id_Agente) VALUES (:descricao,:preco,:autor,:tipo,:conteudo,:nome,:id_Agente)";
        $stmt = Conexao::prepare($sql);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':preco', $this->preco);
        $stmt->bindParam(':autor', $this->autor);
        $stmt->bindParam(':tipo', $this->tipo);
        $stmt->bindParam(':conteudo', $this->conteudo);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':id_Agente', $this->id_Agente);
        return $stmt->execute();
    }

    public function editar($id) {
        
    }

}
