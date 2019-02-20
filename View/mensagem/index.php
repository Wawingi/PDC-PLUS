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
                                    
                                    <!-- Inicio dos amigos para conversa -->
                                    <div class="col-lg-6">
                                        <div class="central-meta">
                                            <div class="frnds">
                                                <ul class="nav nav-tabs">
                                                    <li class="nav-item"><a class="active" href="timeline-friends.html#frends" data-toggle="tab">Mensagens: </a> 
                                                        
                                                    </li>
                                                </ul>
                                                <!-- Listagem dos amigos pesquisados -->
                                                <div class="tab-content">
                                                    <div class="tab-pane active fade show " id="frends" >                                                        
                                                        <?php
                                                            $amizade = new AmizadeModel();
                                                            foreach ($amizade->findAmigos($_SESSION['agente']->id) as $valor):
                                                        ?>
                                                        <ul class="nearby-contct">
                                                            <li>
                                                                <div class="nearly-pepls">
                                                                    <figure>
                                                                       <?php echo "<a href='chat.php?acao=".'pegaId'."&id=".$valor->id_agente."&nome=".$valor->nome."&foto=".$valor->foto."' title=''><img src='../Assets/images/upload/$valor->foto' alt=''></a>" ?>
                                                                    </figure>
                                                                    <div class="pepl-info">
                                                                       
                                                                        <h4><a href="#" title=""><?php echo $valor->nome ?></a></h4>
                                                                        <span><?php echo strtolower($valor->email) ?></span>
                                                                    </div>
                                                                </div>                                                                        
                                                            </li>
                                                        </ul>
                                                        <?php endforeach; ?>
                                                        <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
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
