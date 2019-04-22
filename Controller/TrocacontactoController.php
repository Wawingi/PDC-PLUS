<?php

$op = filter_input(INPUT_POST, 'operacao');
$agente = new AgenteModel();
if ($op == 'alterar_contacto') {
    $telefone = htmlentities(filter_input(INPUT_POST, 'telefone'));
    $email= htmlentities(filter_input(INPUT_POST, 'email'));
    
    
    if (empty($telefone) || empty($email)) {
        echo 'preencha o telefone e o email';
    }else{ 
            //$am = AgenteModel::find('all', array('conditions'=>array('telefone= ?,email= ? AND id_Agente = ?',$telefone,$email,$_SESSION['agente']->id)));
            $am = AgenteModel::find($_SESSION['agente']->id);
            $am->telefone=$telefone;
            $am->email=$email;
            if($am->save()){
                
                $sucesso='Actualizou o email para '.$email.' e o contacto para '.$telefone;
                header("Location:../dashboard/?info1=".base64_encode($sucesso)); 
            }   
    }
}

$contacto=$agente->find($_SESSION['agente']->id);


