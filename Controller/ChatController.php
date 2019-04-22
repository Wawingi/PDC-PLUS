
<?php

$op = filter_input(INPUT_POST, 'operacao');

$chat = new ChatModel();

if($op == 'mensagem'){
  $mensagem=htmlentities(filter_input(INPUT_POST, 'mensagem'));
  $id_agente1=htmlentities(filter_input(INPUT_POST, 'id_agente1'));
  $id_agente2=htmlentities(filter_input(INPUT_POST, 'id_agente2'));
  
  if (!empty($mensagem)) {
    
      $chat->conteudo= base64_encode($mensagem);
      $chat->data=date('Y-m-d\TH:i:s');
      $chat->estado='Nao lido';
      $chat->id_agente1=$id_agente1;
      $chat->id_agente2=$id_agente2;
      
      if($chat->save()){
         //header("Location:../../View/mensagem/chat.php");  
      }
  }else {
    echo "ERORRRRRRR";
  }
}
