<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/PDC_PLUS/system/configuracao.php';

class ChatModel extends ActiveRecord\Model {

    static $table_name = 'mensagem';
    
    
    public function chatAmigos($idagente1,$idagente2) {
        $sql = "SELECT DISTINCT(me.conteudo),me.data,me.id_Agente1'idagente'
                FROM mensagem me
                WHERE (me.id_Agente1= :idagente1 AND me.id_Agente2= :idagente2 OR me.id_Agente1= :idagente2 AND me.id_Agente2= :idagente1)";
        return AmizadeModel::find_by_sql($sql, ['idagente1' => $idagente1,'idagente2' => $idagente2]);
    }

}