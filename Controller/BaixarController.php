<?php

$op = base64_decode(filter_input(INPUT_GET, 'operacao'));
$preco = base64_decode(filter_input(INPUT_GET, 'preco'));      
   
if ($op == 'baixar') {
    //Baixar ficheiro grátis
    if($preco==0){    
        if (!empty(filter_input(INPUT_GET, 'conteudo'))) {
            $fileName = basename(base64_decode(filter_input(INPUT_GET, 'conteudo')));
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
        header("Location:../View/loja/pagamento.php");
    }
    
}    
