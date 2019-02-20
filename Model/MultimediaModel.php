<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/PDC_PLUS/system/configuracao.php';

class MultimediaModel extends ActiveRecord\Model {

    static $table_name = 'multimedia';

    public function findFotosAgente($id_agente,$paginacao) {
      $sql = "SELECT *
              FROM publicacao p ,multimedia m
              WHERE p.id_Publicacao=m.id_Publicacao AND p.id_Agente=:id_agente ORDER BY `data` DESC LIMIT 9 OFFSET $paginacao";

       return MultimediaModel::find_by_sql($sql, ['id_agente' => $id_agente]);

   }

   public function qtdFotos($id_agente) {
     $sql = "SELECT *
             FROM publicacao p ,multimedia m
             WHERE p.id_Publicacao=m.id_Publicacao AND p.id_Agente=:id_agente";

      return MultimediaModel::find_by_sql($sql, ['id_agente' => $id_agente]);
   }

}
