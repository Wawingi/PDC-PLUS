<?php

$op = filter_input(INPUT_POST, 'operacao');
$agente = new AgenteModel();
if ($op == 'alterar_informacao') {
    $nome = htmlentities(filter_input(INPUT_POST, 'nome'));
    $username= htmlentities(filter_input(INPUT_POST, 'username'));
    $data_nascimento= htmlentities(filter_input(INPUT_POST, 'datanascimento'));
     
    if (empty($nome) || empty($username)) {
        echo 'preencha o telefone e o email';
        }else{ 
            //$am = AgenteModel::find('all', array('conditions'=>array('telefone= ?,email= ? AND id_Agente = ?',$telefone,$email,$_SESSION['agente']->id)));
            $am = AgenteModel::find($_SESSION['agente']->id);
            $am->nome=$nome;
            $am->username=$username;
            $am->datanascimento=$data_nascimento;
            if($am->save()){
                
                $sucesso='Dados alterados com sucesso! aparecerão no próximo inicio da sessão.';
                header("Location:../dashboard/?info1=".base64_encode($sucesso)); 
            }   
        }
}

$contacto=$agente->find($_SESSION['agente']->id);
//var_dump($contacto);exit();

