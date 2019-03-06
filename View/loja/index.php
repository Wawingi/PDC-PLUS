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
        <link rel="stylesheet" href="../Assets/css/estilo.css">
        <link rel="stylesheet" href="../Assets/css/style.css">
        <link rel="stylesheet" href="../Assets/css/color.css">
        <link rel="stylesheet" href="../Assets/css/responsive.css">
    </head>
    <body>
        <?php
            require_once '../../Controller/ProdutoController.php';
            //require_once '../../Controller/BaixarController.php';
            
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
                    <?php
                        if (empty(filter_input(INPUT_GET, "id"))){
                    ?>
                        <div class="row">
                            <div class="col-md-3">
                                <a style="margin-left: 130px" href="produto.php" class="btn btn-primary">Adicionar Produto</a>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row" id="page-contents">
                                    <div class="col-lg-1">
                                        <aside class="sidebar static">
                                            <!-- Inicio do Sidebar -->
                                            <?php
                                                //require_once '../includes/sidebar.php';
                                            ?>
                                            <!-- Fim do Sidebar -->
                                            <!-- Inicio do Sidebar Editar -->
                                            <?php
                                                /*if (empty(filter_input(INPUT_GET, "id"))) { 
                                                    require_once '../includes/sidebareditar.php';
                                                } */   
                                            ?>
                                            <!-- Fim do Sidebar Editar -->
                                        </aside>
                                    </div>
                                    
                                    <!-- Inicio Do produto do Agente -->
                                    <!-- Simple card -->
                                    <div style="background-color: #f4f2f2" class="central-meta">
                                        <ul class="photos" style="width: 80.3%;margin-left: 100px">
                                            <?php
                                                foreach ($produtos as $produto):
                                            ?>
                                            <li>
                                                <div class="card m-b-20">
                                                    <img class="card-img-top img-fluid" src="../Assets/images/<?php if($produto->tipo=='Musica'){echo 'musica.jpg';}if($produto->tipo=='Livro'){echo 'livro.jpg';}if($produto->tipo=='Imagem'){echo 'imagem.jpg';} ?>" alt="Card image cap">
                                                    <div class="card-body">
                                                        <h5 style="font-weight: bold" class="card-title"><?php echo "AUTOR: ". strtoupper($produto->autor) ?></h5>
                                                        <hr>
                                                        <p class="card-title"><?php echo "TITULO: ". $produto->titulo; ?></p>
                                                        <hr>
                                                        <p class="card-title"><?php echo "PREÇO: ". $produto->preco ?></p>
                                                        <?php echo "<a href='../../Controller/BaixarController.php?operacao=".base64_encode('baixar')."&conteudo=".base64_encode($produto->conteudo)."&preco=".base64_encode($produto->preco). "' class='btn btn-primary'>Baixar</a>" ?>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php endforeach; ?>                                                                                   
                                            
                                        </ul>
                                        <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
                                        
                                    </div>
                                                                 
                                    <!-- Fim Dos dados do Agente -->
                                    <div class="col-lg-3">
                                        <aside class="sidebar static">
                                            <?php
                                                /*if (empty(filter_input(INPUT_GET, "id"))) { 
                                                    require_once '../includes/amigos.php';
                                                } else {
                                                    require_once '../includes/amigosdoagente.php';
                                                }*/
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
