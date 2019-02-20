<?php
$amizade = new AmizadeModel();
$op = filter_input(INPUT_GET, 'acao');
if ($op == 'aceitarAmigo') {    
        $idAgente1 = htmlentities(filter_input(INPUT_GET, 'idAgente1'));
        $idAgente2 = htmlentities(filter_input(INPUT_GET, 'idAgente2'));
        
        $amizade->idagente1=$idAgente1;
        $amizade->idagente2=$idAgente2;
        
        echo $idAgente1;
        echo $idAgente2;
        exit();
        
        if(empty($idAgente1)&&empty($idAgente2)){
            
        } else {
            //$amizade->save();
        }        
} else {
    
}