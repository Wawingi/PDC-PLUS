<?php

function __autoload($class_nome) {
    require_once '../../Model/' . $class_nome . '.php';
}

require_once '../../Controller/Autenticacao.php';
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <title>Perfil</title>
        <link rel="icon" href="../Assets/images/fav.png" type="image/png" sizes="16x16">

        <link rel="stylesheet" href="../Assets/css/main.min.css">
        <link rel="stylesheet" href="../Assets/css/style.css">
        <link rel="stylesheet" href="../Assets/css/color.css">
        <link rel="stylesheet" href="../Assets/css/responsive.css">
    </head>
    <body>
        <?php
            require_once '../../Controller/AgenteController.php';
        ?>
        <!--<div class="se-pre-con"></div>-->
        <div class="theme-layout">

            <div class="responsive-header">
                <div class="mh-head first Sticky">
                    <span class="mh-btns-left">
                        <a class="" href="time-line.html#menu"><i class="fa fa-align-justify"></i></a>
                    </span>
                    <span class="mh-text">
                        <a href="Pagina inicial.html" title=""><img src="images/logo2.png" alt=""></a>
                    </span>
                    <span class="mh-btns-right">
                        <a class="fa fa-sliders" href="time-line.html#shoppingbag"></a>
                    </span>
                </div>
                <div class="mh-head second">
                    <form class="mh-form">
                        <input placeholder="search" />
                        <a href="time-line.html#/" class="fa fa-search"></a>
                    </form>
                </div>
            </div><!-- responsive header -->

            <!-- inicio do menubar -->
            <?php
                require_once '../includes/menubar.php';
            ?>
            <!-- FIM do menubar -->    

            <?php require_once '../includes/section_capa_perfil.php'; ?>

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
                                            <!-- Inicio do Sidebar Editar -->
                                            <?php
                                            //require_once '../includes/sidebareditar.php';
                                            ?>
                                            <!-- Fim do Sidebar Editar -->
                                        </aside>
                                    </div>
                                    <!-- Inicio de Pedidos -->                             
                                    <div class="col-lg-6">
                                        <div class="central-meta">
                                            <div class="frnds">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item"><a class="active" href="timeline-friends.html#frends" data-toggle="tab">Pedidos de Amizade: </a> 
                                                        
                                                    </li>
                                                </ul>
                                                <!-- Listagem dos amigos pesquisados -->
                                                <div class="tab-content">
                                                    <div class="tab-pane active fade show " id="frends" >                                                        
                                                        
                                                                <ul class="nearby-contct">
                                                                    <?php              
                                                                        foreach (AmizadeModel::findPedidosAmizade($_SESSION['agente']->id) as $valor):
                                                                    ?>
                                                                    <li>
                                                                        <div class="nearly-pepls">
                                                                            <figure>
                                                                                <a href="#" title=""><img src="../Assets/images/upload/<?php echo $valor->foto; ?>" alt=""></a>
                                                                            </figure>
                                                                            <div class="pepl-info">
                                                                                <h4><a href="#" title=""><?php echo $valor->nome ?></a></h4>
                                                                                <span><?php echo $valor->nome ?></span>
                                                                                <?php echo "<a href='pedidosAmizade.php?acao=".'aceitarAmigo'."&idAgente1=".base64_encode($valor->id)."&idAgente2=".base64_encode($_SESSION['agente']->id)."' title='' class='add-butn more-action' data-ripple=''>Aceitar</a>"; ?>
                                                                                <?php echo "<a style='background-color: red' href='pedidosAmizade.php?acao=".'cancelarAmigo'."&idAgente1=".base64_encode($valor->id)."&idAgente2=".base64_encode($_SESSION['agente']->id)."' title='' class='add-butn' data-ripple=''>Cancelar</a>"; ?>
                                                                            </div>
                                                                        </div>                                                                        
                                                                    </li>
                                                                    <?php endforeach; ?>                                                                   
                                                                </ul>

                                                        <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                    <!-- Fim de Pedidos -->

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


            <div class="bottombar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <span class="copyright">© DAMAXAWA 2018. Todos Direitos Reservados.</span>
                            <i><img src="images/credit-cards.png" alt=""></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../Assets/js/main.min.js"></script>
        <script src="../Assets/js/script.js"></script>
    </body>
</html>