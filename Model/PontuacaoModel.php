<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/PDC_PLUS/system/configuracao.php';

class PontuacaoModel extends ActiveRecord\Model {

    static $table_name = 'pontuacao';  
    
    //Função que permite verificar se o agente ja deu um gosto
    public function verificaGosto($id_publicacao,$id_Agente) {
        $sql = "SELECT count(*)'cont'
                FROM pontuacao
                WHERE id_publicacao =:id_publicacao AND id_Agente =:id_Agente";
        return PublicacaoModel::find_by_sql($sql, ['id_publicacao' => $id_publicacao,'id_Agente' =>$id_Agente]);
    }
    
    //Função que permite efectuar gosto de uma publucação
    public function contGosto($id_publicacao) {
        $sql = "SELECT count(*)'cont'
                FROM pontuacao
                WHERE conteudo='gosto' AND id_publicacao =:id_publicacao";
        return PublicacaoModel::find_by_sql($sql, ['id_publicacao' => $id_publicacao]);
    }
    
   

}
