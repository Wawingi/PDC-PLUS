<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/PDC_PLUS/system/configuracao.php';

class AgenteModel extends ActiveRecord\Model {

    static $table_name = 'agente';

    public function autenticar($username, $senha) {
        $AgenteEmail = AgenteModel::find('first', array('email' => $username, 'senha' => $senha));
            if (isset($AgenteEmail)) {
              return $AgenteEmail;
            }
        $AgenteTelefone = AgenteModel::find('first', array('telefone' => $username, 'senha' => $senha));
        return $AgenteTelefone;
    }
    
    public function findAgente($id) {
        $sql = "SELECT *
                FROM agente
                WHERE id_agente= :id";
        return AgenteModel::find_by_sql($sql, ['id' => $id]);
    }

}
