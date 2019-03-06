<?php

$op = filter_input(INPUT_POST, 'operacao');

if ($op == 'registar_produto') {
    
    $preco = htmlentities(filter_input(INPUT_POST, 'preco'));
    $autor = htmlentities(filter_input(INPUT_POST, 'autor'));
    $tipo = htmlentities(filter_input(INPUT_POST, 'tipo'));
    $titulo = htmlentities(filter_input(INPUT_POST, 'titulo'));
    $modalidade = htmlentities(filter_input(INPUT_POST, 'modalidade'));
    $conteudonome = pathinfo($_FILES['conteudo']['name'],PATHINFO_FILENAME);
    $id_Agente = $_SESSION['agente']->id;
    
    
    //Inicio do Upload do ficheiro
    $formatos = array("jpg","png","gif","pdf","mp3");
    $extensao = pathinfo($_FILES['conteudo']['name'],PATHINFO_EXTENSION);
    
    $conteudo = $conteudonome.".$extensao";
    
    if(in_array($extensao, $formatos)){
        $pasta = "../Assets/images/loja/";
        $temp = $_FILES['conteudo']['tmp_name'];
        $novonome = $conteudonome.".$extensao";
       
        if(move_uploaded_file($temp, $pasta.$novonome)){   
            echo "Upload Efectuado...";
        } else {
            echo "Erro ao fazer Upload...";
        }
    } else {
        header("Location:../../View/loja/produto.php?info=".$info="0");
    }
    //Fim de Upload
    
    if(empty($autor)&&empty($preco)&&empty($tipo)&&empty($modalidade)&&empty($conteudo)){
        return "Vazio";
    } else {
        $url = "http://localhost:8080/Largacaixa/webresources/produto/Produto/insert/".$preco."/".$autor."/".$tipo."/".$titulo."/".$modalidade."/".$conteudo."/".$id_Agente;
        $json = file_get_contents($url);
            
        echo $json;    
        
    }
    
} else {
    $url = "http://localhost:8080/Largacaixa/webresources/produto/Produto/pegar/";
    $json = file_get_contents($url);
    $produtos = json_decode($json);
}