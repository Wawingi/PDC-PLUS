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
        <link rel="stylesheet" href="../Assets/css/estilo.css">
        <link rel="stylesheet" href="../Assets/css/color.css">
        <link rel="stylesheet" href="../Assets/css/responsive.css">
    </head>
    <body>
        <?php
            require_once '../../Controller/ChatController.php';
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
                                    
                                    <!-- Inicio dos chat -->
                                    <div class="col-lg-6">
                                        <div class="loadMore">
                                                <div class="central-meta item">
                                                    <div class="user-post">
                                                        

                                                        <div class="coment-area">
                                                            <ul class="we-comet">
                                                                <?php
                                                                    $nomeamigo=filter_input(INPUT_GET, 'nome');
                                                                    $fotoamigo=filter_input(INPUT_GET, 'foto');
                                                                    $idamigo2=filter_input(INPUT_GET, 'id');
                                                                                              
                                                                    foreach (ChatModel::chatAmigos($_SESSION['agente']->id,$idamigo2) as $dado):
                                                                ?>
                                                                    <li>
                                                                        <?php if($dado->idagente==$_SESSION['agente']->id){ ?>
                                                                        <div class="comet-avatar">
                                                                            <img src="../Assets/images/upload/<?php echo $_SESSION['agente']->foto; ?>"  style="height:50px; width:50px;" alt="">
                                                                        </div>
                                                                        <div class="we-comment" style="background-color: #e4f1f7">
                                                                            <div class="coment-head" >
                                                                                <h5><a href="time-line.html" title=""><?php echo $_SESSION['agente']->nome; ?></a></h5>
                                                                                <span><?php echo $dado->data; ?></span>        
                                                                            </div>
                                                                            <p style="color: black"><?php echo $dado->conteudo; ?></p>
                                                                        </div>
                                                                        <?php }else{ ?>
                                                                        <div class="comet-avatar">
                                                                            <img src="../Assets/images/upload/<?php echo $fotoamigo; ?>"  style="height:50px; width:50px;" alt="">
                                                                        </div>
                                                                        <div class="we-comment" style="background-color: #f9f9c1">
                                                                            <div class="coment-head" >
                                                                                <h5><a href="time-line.html" title=""><?php echo $nomeamigo; ?></a></h5>
                                                                                <span><?php echo $dado->data; ?></span>        
                                                                            </div>
                                                                            <p style="color: black"><?php echo $dado->conteudo; ?></p>
                                                                        </div>                                                                                                                                              
                                                                        <?php } ?>
                                                                    </li>
                                                                <?php endforeach; ?>
                                                                <li class="post-comment">
                                                                    <div class="comet-avatar">
                                                                        <img src="images/resources/comet-1.jpg" alt="">
                                                                    </div>
                                                                    <div class="post-comt-box">
                                                                        
                                                                        <form method="post" >
                                                                            <textarea placeholder="escreva a tua mensagem..." required="" name="mensagem"></textarea>
                                                                            <div class="add-smiles">
                                                                                <!--<button><span style="color: blue"  class="fa fa-send"  title="Comentar"></span></button>-->
                                                                                <button style="color: blue; bottom: -5px" type="submit" name="registar" class="fa fa-send"/>
                                                                                <input type="hidden" value="comentar" name="operacao">
                                                                                <input type="hidden" value="<?php echo $_SESSION['agente']->id; ?>" name="id_agente1">
                                                                                <input type="hidden" value="<?php echo filter_input(INPUT_GET, "id"); ?>" name="id_agente2">
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div> 
                                    </div>                                    
                                    <!-- fim chat -->
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
