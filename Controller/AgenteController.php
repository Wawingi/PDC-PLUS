<?php

$op = filter_input(INPUT_POST, 'operacao');
$agente = new AgenteModel();
$auditoria = new AuditoriaModel();
if ($op == 'registar') {
    $nome = filter_input(INPUT_POST, 'nome');
    $telefone = filter_input(INPUT_POST, 'telefone');
    $pais = filter_input(INPUT_POST, 'pais');
    $cidade = filter_input(INPUT_POST, 'cidade');
    $datanascimento = filter_input(INPUT_POST, 'datanascimento');
    $tipo = filter_input(INPUT_POST, 'tipo');
    $sexo = filter_input(INPUT_POST, 'sexo');
    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');
    
    if (empty($nome) || empty($telefone) || empty($pais) || empty($tipo) || empty($email) || empty($senha)) {
        echo 'DADOS EM FALTA';
    } else if ($tipo=='Escolha o tipo'){
        $error='Escolha um tipo de conta';
        header("Location:../inicio/?info=".base64_encode($error));
    } else if($pais=='pais'){
        $error='Escolha um pais';
        header("Location:../inicio/?info=".base64_encode($error));
    } else if ((strlen($senha))<4){
        $error='Senha muito fraca!!!';
        header("Location:../inicio/?info=".base64_encode($error));
    } else {   
        //Função que valida a idade de um agente
        $dataactual = explode("-",date('Y'));
        $data_actual = $dataactual[0];
        
        $datanascim = explode("-",$datanascimento);
        $data_nascimento = $datanascim[0];
        
        if(($data_actual-$data_nascimento)<18){
            $error='A idade não permite-lhe ter conta!!!';
            header("Location:../inicio/?info=".base64_encode($error));
        }
        
        $agente->nome = htmlentities($nome);
        $un = explode(" ", $nome);
        $agente->username = htmlentities($un[0]);
        $agente->senha = htmlentities(sha1($senha));
        $agente->datanascimento = htmlentities($datanascimento);
        $agente->email = htmlentities($email);
        $agente->telefone = htmlentities($telefone);
        $agente->pais = htmlentities($pais);
        $agente->cidade = htmlentities($cidade);
        $agente->tipo = htmlentities($tipo);
        $agente->sexo = htmlentities($sexo);
        $agente->permissao = htmlentities('publico');
        $agente->foto = 'padrao.png';
        $agente->capa = 'padrao.png';
        if (AgenteModel::exists(array('email' => $email))||AgenteModel::exists(array('telefone' => $telefone)))
        {
            $error='Já possui uma conta com este email ou telefone!!!';
            header("Location:../inicio/?info=".base64_encode($error));
        } else {
            if($agente->save()){
                //Registo de auditoria
                $auditoria->evento = 'Um novo agente foi registado';
                $auditoria->agente = $nome;
                $auditoria->data = date('Y-m-d\TH:i:s');
                
                $auditoria->save();
                
                $sucesso='Conta criada com sucesso, pode efectuar o seu login.';
                header("Location:../inicio/?info1=".base64_encode($sucesso)); 
            }else{
                echo 'Erro durante o registo! verifique os dados';
            }
        }
    }
}

if ($op == 'logar') {
    $username = filter_input(INPUT_POST, 'username');
    $senha = sha1(filter_input(INPUT_POST, 'senha'));
    // Verificar os campos 
    $agente->username = $username;
    $agente->senha = $senha;

    if (empty($username) || empty($senha)) {
        echo 'DADOS INCOMPLETOS';
    } else {
        $pegaAgente = $agente->autenticar($username, $senha);
        if (!empty($pegaAgente->email) && !empty($pegaAgente->senha)) {
            session_start();
            $_SESSION['agente'] = $pegaAgente;

            if ($pegaAgente->tipo == 'Individual') {
                //Registo de auditoria
                $auditoria->evento = 'Agente individual fez login';
                $auditoria->agente = $_SESSION['agente']->nome;
                $auditoria->data = date('Y-m-d\TH:i:s');
                
                $auditoria->save();
                
                header("Location: ../../View/dashboard/");
            } elseif ($pegaAgente->tipo == 'Organizacional') {
                //Registo de auditoria
                $auditoria->evento = 'Agente organizacional fez login';
                $auditoria->agente = $_SESSION['agente']->nome;
                $auditoria->data = date('Y-m-d\TH:i:s');
                
                $auditoria->save();
                header("Location: ../../View/loja/");
            }
        } else {
            session_abort();
            session_destroy();
            unset($_SESSION['agente']);

            $error='Credenciais Inválidas';
            header("Location:../inicio/?info=".base64_encode($error)); 

            //header("Location: ../../View/inicio/");  //Alerta Credenciais Invalidos
        }
    }
}
if($op == 'pesquisar'){
    $nome = htmlentities(filter_input(INPUT_POST, 'nome'));
    if(empty($nome)){
        
    } else {
        $primeiroNome = explode(" ", $nome);
        header("Location: ../../View/amigos/pesquisarAmigo.php?ag=".base64_encode($primeiroNome[0]));
    }    
}
 else {  
    $id = base64_decode(filter_input(INPUT_GET, 'id'));
    $op = filter_input(INPUT_GET, 'acao');
    $idAgente1 = htmlentities(filter_input(INPUT_GET, 'idAgente1'));
    $idAgente2 = htmlentities(filter_input(INPUT_GET, 'idAgente2'));
    $tipo = htmlentities(filter_input(INPUT_GET, 'tipo'));
    $amizade = new AmizadeModel();
    if($op=='verPerfil'){
        $agentePesquisado = $agente->findAgente($id);
    }
    if($op=='addAmigo'){//Adicionar pedido de amizade
              
        $amizade->idagente1= base64_decode($idAgente1);
        $amizade->idagente2= base64_decode($idAgente2);
        if($tipo=='Individual'){
            $amizade->estado='pendente';
        } else {
            $amizade->estado='amigos';
        }
        if(empty($idAgente1)&&empty($idAgente2)){
            
        } else {
            $sucesso='Contacto Adicionado com sucesso.';
            if($amizade->save()){
                //Registo de auditoria
                $auditoria->evento = 'Um agente agente com id '.base64_decode($idAgente2).' foi adicionado como amigo';
                $auditoria->agente = $_SESSION['agente']->nome;
                $auditoria->data = date('Y-m-d\TH:i:s');
                
                $auditoria->save();
                header("Location: ../../View/dashboard/?info1=".base64_encode($sucesso));
            }
        }        
    }
    if($op=='cancelarAmigo'){
        
        $amizade->idagente1= base64_decode($idAgente1);
        $amizade->idagente2= base64_decode($idAgente2);
     
        $sucesso='Contacto Cancelado com sucesso.';
        if($amizade->delete(array('idAgente1','idAgente2' => array('idagente1 = ? AND idagente2 = ?',$idAgente1 , $idAgente2)))){
            header("Location: ../../View/dashboard/?info1=".base64_encode($sucesso));
        }
    }
    if($op=='aceitarAmigo'){ 
        $amizade->idagente1= base64_decode($idAgente1);
        $amizade->idagente2= base64_decode($idAgente2);
               
        if(empty($idAgente1)&&empty($idAgente2)){
            
        } else {
            $am = AmizadeModel::find('all', array('conditions'=>array('idagente1 = ? AND idagente2 = ?', base64_decode($idAgente1), base64_decode($idAgente2))));
            $am[0]->estado='amigos';
            $am[0]->save();
            
            //Registo de auditoria
                $auditoria->evento = 'Um agente aceitou um pedido de amizade do agente com id'.base64_decode($idAgente2);
                $auditoria->agente = $_SESSION['agente']->nome;
                $auditoria->data = date('Y-m-d\TH:i:s');
                
                $auditoria->save();
        }        
    } 
}