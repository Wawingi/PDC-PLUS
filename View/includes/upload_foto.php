<?php
require_once '../../Model/UploadModel.php';
require_once '../../Model/AgenteModel.php';
require_once '../../Model/MultimediaModel.php';
require_once '../../Model/PublicacaoModel.php';
try {
    session_start();
if ((isset($_POST["foto_perfil"])) && (! empty($_FILES['foto_perfil']))){
    $upload = new UploadModel($_FILES['foto_perfil'], 900, 900, "../Assets/images/upload/");
        $nome_arquivo= $upload->salvar();
        if ($nome_arquivo=="Formato Invalido"||$nome_arquivo=="Erro 0") {
          echo " erro do formato";
          header("Location: ../perfil/");

        }else{

        $agente=AgenteModel::find($_SESSION['agente']->id);
        $agente->foto=$nome_arquivo;
        $agente->save();
        $publicacao = new PublicacaoModel();
        $publicacao->conteudo = "foto de perfil";
        $publicacao->permissao = "publico";
        $publicacao->data = date('Y-m-d\TH:i:s');
        $publicacao->tipo="imagem";
        $publicacao->midia=$nome_arquivo;
        $publicacao->id_agente = $_SESSION['agente']->id;
        $publicacao->save();
        $multimedia = new MultimediaModel();
        $multimedia->tipo = "imagem";
        $multimedia->conteudo = $nome_arquivo;
        $multimedia->id_publicacao = $publicacao->id;
        $multimedia->save();
        header("Location: TerminarSessao.php");}
}
//Na tabela agente tem de se adicionar o campo foto de capa
if ((isset($_POST["foto_capa"])) && (! empty($_FILES['foto_capa']))){
    $upload = new UploadModel($_FILES['foto_capa'], 434, 1280, "../Assets/images/upload/");
        $nome_arquivoCapa= $upload->salvar();
        if ($nome_arquivoCapa=="Erro 0") {
        echo "Erro 0";
      } elseif ($nome_arquivoCapa=="Tamanho excede o permitido") {
        echo "Tamanho excede o permitido";
      }elseif($nome_arquivoCapa == "Formato Invalido"){
        echo "Formato Invalido";
      }else{

        $agente=AgenteModel::find($_SESSION['agente']->id);
        $agente->capa=$nome_arquivoCapa;
        $agente->save();
        $publicacao = new PublicacaoModel();
        $publicacao->conteudo = "foto de capa";
        $publicacao->permissao = "publico";
        $publicacao->data = date('Y-m-d\TH:i:s');
        $publicacao->tipo="imagem";
        $publicacao->midia=$nome_arquivoCapa;
        $publicacao->id_agente = $_SESSION['agente']->id;
        $publicacao->save();
        $multimedia = new MultimediaModel();
        $multimedia->tipo = "imagem";
        $multimedia->conteudo = $nome_arquivoCapa;
        $multimedia->id_publicacao = $publicacao->id;
        $multimedia->save();
        header("Location: TerminarSessao.php");
}}


} catch (Exception $exc) {
    echo $exc->getMessage();
}
