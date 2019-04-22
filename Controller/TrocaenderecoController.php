<?php



$op = filter_input(INPUT_POST, 'operacao');
$agente = new AgenteModel();
if ($op == 'alterar_endereco') {
    $cidade = htmlentities(filter_input(INPUT_POST, 'cidade'));
    $pais= htmlentities(filter_input(INPUT_POST, 'pais'));
    
    
    if (empty($cidade) || empty($pais)) {
        echo 'preencha a cidade e o pais';
        }else{ 
            //$am = AgenteModel::find('all', array('conditions'=>array('telefone= ?,email= ? AND id_Agente = ?',$telefone,$email,$_SESSION['agente']->id)));
            $am = AgenteModel::find($_SESSION['agente']->id);
            $am->pais=$pais;
            $am->cidade=$cidade;
            if($am->save()){
                $sucesso='Actualizou a cidade para '.$cidade.' e o pais para '.$pais;
                header("Location:../dashboard/?info1=".base64_encode($sucesso)); 
        }   
    }
}

$contacto=$agente->find($_SESSION['agente']->id);
//var_dump($contacto);exit();

