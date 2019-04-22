<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/PDC_PLUS/system/configuracao.php';

class PublicacaoModel extends ActiveRecord\Model {

    static $table_name = 'publicacao';

    public function findAllPublicacao() {
        $sql = "SELECT id_publicacao,conteudo,data,nome,midia,ag.foto
                FROM publicacao p, agente ag
                WHERE p.id_Agente=ag.id_Agente ORDER BY `data` DESC";
        return PublicacaoModel::find_by_sql($sql);
    }
    
    //Publicações de todos agentes
    public function findAllPublicacaoAmigos() {
        $sql = "SELECT id_publicacao,conteudo,data,nome,midia,ag.foto,p.permissao,p.id_agente
                FROM publicacao p, agente ag
                WHERE p.id_Agente=ag.id_Agente ORDER BY `data` DESC";
        return PublicacaoModel::find_by_sql($sql);
    }
    
    //Publicações de um determinado agente
    public function findPublicacaoAgente($id_agente) {
        $sql = "SELECT id_publicacao,conteudo,data,nome,midia,ag.foto,p.permissao
                FROM publicacao p, agente ag
                WHERE p.id_Agente=ag.id_Agente and ag.id_agente= :id_agente ORDER BY `data` DESC";
        return PublicacaoModel::find_by_sql($sql, ['id_agente' => $id_agente]);
    }
    
    public function comentariosPublicacao($id_publicacao) {
      $sql = "SELECT c.conteudo, c.data, a.nome, a.foto
      FROM comentario c,agente a
      WHERE  a.id_Agente=c.id_Agente AND c.id_Publicacao=:id_publicacao";
      return PublicacaoModel::find_by_sql($sql, ['id_publicacao' => $id_publicacao]);
    }




}
