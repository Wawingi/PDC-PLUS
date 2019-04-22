<?php

$op = filter_input(INPUT_POST, 'operacao');
$agente = new AgenteModel();
if ($op == 'alterar_senha') {
    $senha_antiga = htmlentities(filter_input(INPUT_POST, 'senha_antiga'));
    $senha_nova = htmlentities(filter_input(INPUT_POST, 'senha_nova'));
    $senha_nova_confirmar = htmlentities(filter_input(INPUT_POST, 'senha_nova_confirmar'));
    
    if (empty($senha_antiga) || empty($senha_nova) || empty($senha_nova_confirmar)) {
        echo 'DADOS EM FALTA';
    } else if ($senha_nova == $senha_nova_confirmar){
        if((strlen($senha_nova))<4){
            $error='Senha muito curta, para melhor segurança escolha uma senha de mínimo 4 dígitos!';
            header("Location:../informação/editarSenha.php?info=".base64_encode($error));
        }else{ 
            $am = AgenteModel::find('all', array('conditions'=>array('senha = ? AND id_Agente = ?', sha1($senha_antiga),$_SESSION['agente']->id)));
            $am[0]->senha= sha1($senha_nova);
            if($am[0]->save()){
                session_destroy();
                
                $sucesso='Senha alterada com sucesso, faça login para confirmar alteração.';
                header("Location:../inicio/?info1=".base64_encode($sucesso));
                
            } else {        
                $error='As senhas não casam...';
                header("Location:../informação/editarSenha.php?info=".base64_encode($error));
            }          
        }
    } else {
        $error='Senhas de confirmação diferente, por favor insira novamente!';
        header("Location:../informação/editarSenha.php?info=".base64_encode($error));
    }
}