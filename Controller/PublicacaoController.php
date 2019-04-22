
<?php

$op = filter_input(INPUT_POST, 'operacao');

$publicacao = new PublicacaoModel();
$auditoria = new AuditoriaModel();

if ($op == 'publicar') {

    $conteudo = htmlentities(filter_input(INPUT_POST, 'conteudo'));
    $permissao = htmlentities(filter_input(INPUT_POST, 'permissao'));
    $imagem = $_FILES['imagem'];
    $video = filter_input(INPUT_POST, 'video');
    $id_Agente = htmlentities(filter_input(INPUT_POST, 'id_Agente'));
    if (empty($conteudo) || empty($permissao) || empty($id_Agente)) {
        echo 'Campos vazios![forneça os dados]';
    } else {
        try {
          if (empty($imagem['name'])) {
            $publicacao->conteudo = $conteudo;
            $publicacao->permissao = $permissao;
            $publicacao->data = date('Y-m-d\TH:i:s');
            $publicacao->id_agente = $id_Agente;
            
            if($publicacao->save()){
                echo 'Salvo com sucesso';
                Header("Location: ../../View/perfil/");
            }
          }else{

            $upload = new UploadModel($imagem, 1000, 900, $_SERVER['DOCUMENT_ROOT'] . "/pdc_plus/View/Assets/images/upload/");
            $nome_arquivo = $upload->salvar();

            if ($nome_arquivo=="Erro 0") {
            echo "Erro 0";
          } elseif ($nome_arquivo=="Tamanho excede o permitido") {
            echo "Tamanho excede o permitido";
          }elseif($nome_arquivo == "Formato Invalido"){
            echo "Formato Invalido";
          }else{
            $publicacao->conteudo = $conteudo;
            $publicacao->permissao = $permissao;
            $publicacao->data = date('Y-m-d\TH:i:s');
            $publicacao->id_agente = $id_Agente;
            $publicacao->tipo="imagem";
            $publicacao->midia=$nome_arquivo;
            $publicacao->save();

            $multimedia = new MultimediaModel();
            $multimedia->tipo = "imagem";
            $multimedia->conteudo = $nome_arquivo;
            $multimedia->id_publicacao = $publicacao->id;
            $multimedia->save();
            
            //Registo de auditoria
                $auditoria->evento = 'Um agente fez uma publicação';
                $auditoria->agente = $_SESSION['agente']->nome;
                $auditoria->data = date('Y-m-d\TH:i:s');
                
                $auditoria->save();
                
                header("Location: ../dashboard/");
            }
          }
        } catch (Exception $exc) {
            echo $exc->getMessage()."[Erro na Publicação controller]";
        }
    }
}

if($op=='comentar'){
  $conteudo=htmlentities(filter_input(INPUT_POST, 'conteudo_comentario'));
  $id_agente=htmlentities(filter_input(INPUT_POST, 'id_agente'));
  $publicacao=htmlentities(filter_input(INPUT_POST, 'id_publicacao'));

  if (!empty($conteudo)) {
    $comentario= new ComentarioModel();
    $comentario->conteudo=$conteudo;
    $comentario->data= date('Y-m-d\TH:i:s');
    $comentario->id_agente=$id_agente ;
    $comentario->id_publicacao= $publicacao;
    if($comentario->save()){
        //Registo de auditoria
            $auditoria->evento = 'Um agente comentou uma publicação';
            $auditoria->agente = $_SESSION['agente']->nome;
            $auditoria->data = date('Y-m-d\TH:i:s');
                
            $auditoria->save();
    }
  }else {
    echo "Preencha os campos!";
  }
}
