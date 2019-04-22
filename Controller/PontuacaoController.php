<?php

$op = base64_decode(filter_input(INPUT_GET, 'operacao'));
$pontuacao = new PontuacaoModel();
$auditoria = new AuditoriaModel();

if ($op == 'gostar') {
    $conteudo = 'gosto';
    $id_agente = $_SESSION['agente']->id;
    $id_Publicacao = base64_decode(filter_input(INPUT_GET, 'idPub'));
    
    $verifica = $pontuacao->verificaGosto($id_Publicacao, $id_agente);
    
    if($verifica[0]->cont){
        
        if($pontuacao->delete(array('id_Agente' => array('id_Agente = ?',$id_agente)))){
            
        }
        /*if($amizade->delete(array('idAgente1','idAgente2' => array('idagente1 = ? AND idagente2 = ?',$idAgente1 , $idAgente2)))){
            header("Location: ../../View/dashboard/");
        }*/
        
    }else{
        $pontuacao->conteudo = $conteudo;
        $pontuacao->id_agente = $id_agente;
        $pontuacao->id_publicacao = $id_Publicacao;

        if($pontuacao->save()){
            //Registo de auditoria
                $auditoria->evento = 'Um agente curtiu uma publicação do agente com id'.$id_agente;
                $auditoria->agente = $_SESSION['agente']->nome;
                $auditoria->data = date('Y-m-d\TH:i:s');
                
                $auditoria->save();
                
                header("Location:../dashboard/");
        }      
    }
} else if ($op == 'gostar_perfil') {
    $conteudo = 'gosto';
    $id_agente = $_SESSION['agente']->id;
    $id_Publicacao = base64_decode(filter_input(INPUT_GET, 'idPub'));
    
    $verifica = $pontuacao->verificaGosto($id_Publicacao, $id_agente);
    
    if($verifica[0]->cont){      
        if($pontuacao->delete(array('id_agente' => array('id_agente = ?',$id_agente)))){
            
        }
        /*if($amizade->delete(array('idAgente1','idAgente2' => array('idagente1 = ? AND idagente2 = ?',$idAgente1 , $idAgente2)))){
            header("Location: ../../View/dashboard/");
        }*/
        
    }else{
        $pontuacao->conteudo = $conteudo;
        $pontuacao->id_agente = $id_agente;
        $pontuacao->id_publicacao = $id_Publicacao;

        if($pontuacao->save()){
            //Registo de auditoria
                $auditoria->evento = 'Um agente curtiu uma publicação do agente com id '.$id_agente;
                $auditoria->agente = $_SESSION['agente']->nome;
                $auditoria->data = date('Y-m-d\TH:i:s');
                
                $auditoria->save();
                header("Location:../perfil/");
        }      
    }
}    
