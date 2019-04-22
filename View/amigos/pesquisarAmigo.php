<!DOCTYPE html>
<?php
require_once '../../Controller/Autenticacao.php';

function __autoload($class_nome) {
    require_once '../../Model/' . $class_nome . '.php';
}
?>
<html lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <title>Bem vindo</title>
        <link rel="icon" href="../Assets/images/fav.png" type="image/png" sizes="16x16">

        <link rel="stylesheet" href="../Assets/css/main.min.css">
        <link rel="stylesheet" href="../Assets/css/style.css">
        <link rel="stylesheet" href="../Assets/css/color.css">
        <link rel="stylesheet" href="../Assets/css/responsive.css">
    </head>
    <body>
        <?php
            require_once '../../Controller/PublicacaoController.php';
            require_once '../../Controller/AgenteController.php';
        ?>

        <!--<div class="se-pre-con"></div>-->
        <div class="theme-layout">
            <div class="responsive-header">
                <div class="mh-head first Sticky">
                    <span class="mh-text">
                        <a href="newsfeed.html" title=""><img src="../Assets/images/logo2.png" alt=""></a>
                    </span>
                </div>

            </div>

            <!-- inicio do menubar -->
            <?php
            require_once '../includes/menubar.php';
            ?>
            <!-- FIM do menubar -->       

            <section>
                <div class="gap gray-bg">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row" id="page-contents">
                                    <div class="col-lg-3">
                                        <aside class="sidebar static">
                                            <!-- Inicio do Sidebar -->
                                            <?php
                                                require_once '../includes/sidebar.php';
                                            ?>
                                            <!-- Fim do Sidebar -->

                                        </aside>
                                    </div>

                                    <!-- Amigos achados-->
                                    <div class="col-lg-6">
                                        <div class="central-meta">
                                            <div class="frnds">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item"><a class="active" href="timeline-friends.html#frends" data-toggle="tab">Registos Encontrados: </a> 
                                                        <span>
                                                            <?php
                                                                //$ag = base64_decode(filter_input(INPUT_GET, 'ag'));
                                                                //echo count($agente->all(array('conditions' => array("nome LIKE '%$ag%'"))));
                                                            ?>
                                                        </span>
                                                    </li>
                                                </ul>
                                                <!-- Listagem dos amigos pesquisados -->
                                                <div class="tab-content">
                                                    <div class="tab-pane active fade show " id="frends" >                                                        
                                                        <?php
                                                            $pegaAgente = base64_decode(filter_input(INPUT_GET, 'ag'));
                                                            
                                                            foreach ($agente->all(array('conditions' => array("permissao='publico' AND nome LIKE '%$pegaAgente%'"))) as $valor):
                                                                if($valor->email != $_SESSION['agente']->email){
                                                        ?>
                                                        <ul class="nearby-contct">
                                                            <li>
                                                                <div class="nearly-pepls">
                                                                    <figure>
                                                                        <a href="#" title=""><img src="../Assets/images/upload/<?php echo $valor->foto; ?>" alt=""></a>
                                                                    </figure>
                                                                    <div class="pepl-info">
                                                                       
                                                                        <h4><a href="#" title=""><?php echo $valor->nome ?></a></h4>
                                                                        <span><?php echo $valor->cidade ?></span>
                                                                        <?php 
                                                                            if($valor->tipo=='Individual'){
                                                                                echo "<a href='../perfil/?acao=".'verPerfil'."&id=".base64_encode($valor->id)."&tipo=".$valor->tipo."' title='' class='add-butn more-action' data-ripple=''>Ver Perfil</a>"; 
                                                                            } else {
                                                                                echo "<a href='../loja/?acao=".'verPerfil'."&id=".base64_encode($valor->id)."&tipo=".$valor->tipo."' title='' class='add-butn more-action' data-ripple=''>Ver Perfil</a>"; 
                                                                            }
                                                                        ?>
                                                                        <?php 
                                                                            $amizade = new AmizadeModel();
                                                                            $pegaEstado=$amizade->all(array('conditions' => array('idagente1 = ? AND idagente2 = ?',$_SESSION['agente']->id , $valor->id)));
                                                                            if($pegaEstado){ 
                                                                               echo "<a style='background-color: red' href='pesquisarAmigo.php?acao=".'cancelarAmigo'."&idAgente1=".base64_encode($_SESSION['agente']->id)."&idAgente2=".base64_encode($valor->id)."' title='' class='add-butn' data-ripple=''>Cancelar</a>";
                                                                            } else {
                                                                               echo "<a href='pesquisarAmigo.php?acao=".'addAmigo'."&idAgente1=".base64_encode($_SESSION['agente']->id)."&idAgente2=".base64_encode($valor->id)."&tipo=".$valor->tipo. "' title='' class='add-butn' data-ripple=''>Adicionar</a>";
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                </div>                                                                        
                                                            </li>
                                                        </ul>
                                                        <?php } endforeach; ?>
                                                        <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                    
                                    <!-- -->               
                                    <!-- Inicio Amigos mensagem -->
                                    <div class="col-lg-3">
                                        <aside class="sidebar static">
                                            <?php
                                            require_once '../includes/amigos.php';
                                            ?>
                                        </aside>
                                    </div>
                                    <!-- fim Amigos mensagem -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Inicio Rodapé -->
            <div class="bottombar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="copyright">© DAMAXAWA 2018. Todos Direitos Reservados.</span>
                            <i><img src="../Assets/images/credit-cards.png" alt=""></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim Rodapé -->
        </div>
        <script src="../Assets/js/main.min.js"></script>
        <script src="../Assets/js/script.js"></script>
    </body>
</html>
