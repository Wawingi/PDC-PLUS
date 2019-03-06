<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/PDC_PLUS/system/configuracao.php';

class AmizadeModel extends ActiveRecord\Model {

    static $table_name = 'amizade';
    
    
    
    public function findPedidosAmizade($idagente2) {
        $sql = "SELECT am.idAgente1,am.idAgente2,ag.nome,ag.cidade,ag.foto
                FROM amizade am,agente ag 
                WHERE am.idAgente1=ag.id_Agente AND am.idAgente2= :idagente2 AND estado='pendente'";
        return AmizadeModel::find_by_sql($sql, ['idagente2' => $idagente2]);
    }
    
    public function findAmigos($idagente1) {
        $sql = "SELECT am.idAgente1,am.idAgente2,ag.nome,ag.cidade,ag.foto,ag.email,ag.id_agente
                FROM amizade am,agente ag 
                WHERE ag.tipo='individual' AND am.estado='amigos' AND ag.id_Agente=am.idAgente1 AND am.idAgente2= :idagente1 OR ag.id_Agente=am.idAgente2 AND am.idAgente1= :idagente1";
        return AmizadeModel::find_by_sql($sql, ['idagente1' => $idagente1]);
    }
    
}
