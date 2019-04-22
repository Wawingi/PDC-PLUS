<?php

$op = filter_input(INPUT_POST, 'operacao');
$agente = new AgenteModel();
if ($op == 'alterar_tipo') {
    $tipo = htmlentities(filter_input(INPUT_POST, 'tipo'));    
    
    if (empty($tipo)) {
        echo 'preencha o tipo';
    }else{ 
            //$am = AgenteModel::find('all', array('conditions'=>array('telefone= ?,email= ? AND id_Agente = ?',$telefone,$email,$_SESSION['agente']->id)));
            $am = AgenteModel::find($_SESSION['agente']->id);
            $am->tipo=$tipo;
            if($am->save()){
                session_destroy();
                $sucesso='O seu tipo foi alterado com sucesso, por favor efectue login para visualizar as alterações.';
                header("Location:../inicio/?info1=".base64_encode($sucesso)); 
            }   
    }
}
