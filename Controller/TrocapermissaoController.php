<?php

$op = filter_input(INPUT_POST, 'operacao');
$agente = new AgenteModel();
if ($op == 'alterar_permissao') {
    $permissao = htmlentities(filter_input(INPUT_POST, 'permissao'));    
    
    if (empty($permissao)) {
        echo 'preencha a permissao';
    }else{ 
            //$am = AgenteModel::find('all', array('conditions'=>array('telefone= ?,email= ? AND id_Agente = ?',$telefone,$email,$_SESSION['agente']->id)));
            $am = AgenteModel::find($_SESSION['agente']->id);
            $am->permissao=$permissao;
            if($am->save()){
                $sucesso='A sua permissão foi alterada com sucesso para '.$permissao;
                header("Location:../dashboard/?info1=".base64_encode($sucesso)); 
                 //header("Location: ../inicio/");
            }   
    }
}