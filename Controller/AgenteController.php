<?php

$op = filter_input(INPUT_POST, 'operacao');
$agente = new AgenteModel();
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
        echo 'Escolha um tipo de conta válido';
    } else if ((strlen($senha))<4){
        echo 'SENHA MUITO FRACA...';
    } else {
        $agente->nome = htmlentities($nome);
        $un = explode(" ", $nome);
        $agente->username = htmlentities($un[0]);//echo htmlentities();
        //   htmlentities(): é a função que extrai os caracteres especiais do html.
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
        if (AgenteModel::exists(array('email' => $email))||AgenteModel::exists(array('telefone' => $email)))
        {
            echo 'Já possui uma conta com este email';
         } else {
            if($agente->save()){
               header("Location:../../View/inicio/"); 
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
                header("Location: ../../View/dashboard/");
            } elseif ($pegaAgente->tipo == 'Organizaci') {
                header("Location: ../../View/loja/");
            }
        } else {
            session_abort();
            session_destroy();
            unset($_SESSION['agente']);
            header("Location: ../../View/inicio/");  //Alerta Credenciais Invalidos
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
    $id = filter_input(INPUT_GET, 'id');
    $op = filter_input(INPUT_GET, 'acao');
    $idAgente1 = htmlentities(filter_input(INPUT_GET, 'idAgente1'));
    $idAgente2 = htmlentities(filter_input(INPUT_GET, 'idAgente2'));
    $amizade = new AmizadeModel();
    if($op=='verPerfil'){
        $agentePesquisado = $agente->findAgente($id);
    }
    if($op=='addAmigo'){//Adicionar pedido de amizade
              
        $amizade->idagente1=$idAgente1;
        $amizade->idagente2=$idAgente2;
        $amizade->estado='pendente';
        
        if(empty($idAgente1)&&empty($idAgente2)){
            
        } else {
            $amizade->save();
        }        
    }
    if($op=='cancelarAmigo'){
        
        $amizade->idagente1=$idAgente1;
        $amizade->idagente2=$idAgente2;
        $amizade->delete(array('idAgente1','idAgente2' => array('idagente1 = ? AND idagente2 = ?',$idAgente1 , $idAgente2)));
    }
    if($op=='aceitarAmigo'){ 
        $amizade->idagente1=$idAgente1;
        $amizade->idagente2=$idAgente2;
               
        if(empty($idAgente1)&&empty($idAgente2)){
            
        } else {
            
            $am = AmizadeModel::find('all', array('conditions'=>array('idagente1 = ? AND idagente2 = ?',$idAgente1,$idAgente2)));
            $am[0]->estado='amigos';
            $am[0]->save();
        }        
    } 
}