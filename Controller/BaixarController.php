<?php

$op = base64_decode(filter_input(INPUT_GET, 'operacao'));
$preco = base64_decode(filter_input(INPUT_GET, 'preco'));      
$fileName = basename(base64_decode(filter_input(INPUT_GET, 'conteudo')));

if ($op == 'baixar') {
    //Baixar ficheiro grátis
    if($preco==0){    
        if (!empty(filter_input(INPUT_GET, 'conteudo'))) {
         
            $path = '../View/Assets/images/loja/'. $fileName;
            
            if (!empty($fileName) && file_exists($path)) {
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=" . $fileName);
                header("Content-Type: application/zip");
                header("Content-Transfer-Encoding: binary");
                readfile($path);
                exit();
            } else {
                echo'Vazio filename ou Documento não existe';
            }
        }
    } else if($preco>0) {
        header("Location:../View/loja/pagamento.php?preco=". base64_encode($preco)."&conteudo=".base64_encode($fileName));
    }
    
}else{
    $op = filter_input(INPUT_POST, 'operacao');
    $preco = base64_decode(filter_input(INPUT_POST, 'preco'));
    $file = basename(base64_decode(filter_input(INPUT_POST, 'conteudo')));
    $nome = filter_input(INPUT_POST, 'nome');
    $codigo = filter_input(INPUT_POST, 'codigo');
    $conta = filter_input(INPUT_POST, 'conta');
    
    if($op == 'efectuar_pagamento'){
            
        $url = "http://192.168.100.224:8080/PagamigoAPI/webresources/generic/Banco/pagar/".$conta."/".$codigo."/".$preco;
        $estado = file_get_contents($url);
          
        
        
        if($estado){
            $path = '../View/Assets/images/loja/'. $file;
            echo $path.'<br>';
            echo $file.'<br>';
            
            if (!empty($file)) {
                header("Cache-Control: public");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=" . $file);
                header("Content-Type: application/zip");
                header("Content-Transfer-Encoding: binary");
                readfile($path);
                echo "Compra efectuada com sucesso";                
                //header("Location:../../View/dashboard/");
                //echo 'QUERO BAIXAR';
                exit();
            } else {
                echo'filename ou Documento não existe';
            }
        } else {
            $error='Compra inválida! Por favor cheque a sua conta';
            header("Location:../loja/pagamento.php?preco=".base64_encode($preco)."&conteudo=".base64_encode($conteudo)."&info1=".base64_encode($error));
        }

    }
}    
