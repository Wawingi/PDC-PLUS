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
        require_once '../../Controller/PublicacaoController.php';
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

            <?php require_once '../includes/section_capa_perfil.php'; ?><!-- top area -->
            <?php
                if (empty(filter_input(INPUT_GET, "id"))) {
            ?>
                <section>
                    <div class="gap gray-bg">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row" id="page-contents">
                                        <div class="col-lg-3">

                                        </div><!-- sidebar -->
                                        <div class="col-lg-12">
                                            <div class="central-meta">
                                                <div class="row">
                                                    <?php
                                                    $paginacao = htmlentities(filter_input(INPUT_GET, 'paginacao', FILTER_VALIDATE_INT));
                                                    if (empty($paginacao))
                                                        $paginacao = 0;
                                                    $fotos = MultimediaModel::findFotosAgente($_SESSION['agente']->id, $paginacao);

                                                    foreach ($fotos as $key):
                                                        ?>
                                                        <div class="col-lg-4" >
                                                            <a class="strip" href="../Assets/images/upload/<?php echo $key->conteudo; ?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                                <img style="height:305px; width:405px; padding-top: 20px;" class="col-lg-12"    src="../Assets/images/upload/<?php echo $key->conteudo; ?>" alt=""></a>
                                                        </div>


                                                    <?php endforeach; ?>

                                                </div>

                                                <div class="lodmore"><button class="btn-view btn-load-more"></button></div>

                                            </div><!-- photos -->

                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-center">
                                                    <?php
                                                    $dado = 0;
                                                    for ($count = 0; $count < count(MultimediaModel::qtdFotos($_SESSION['agente']->id)) / 9; $count++):
                                                        ?>
                                                        <li class="page-item"><a class="page-link" href="?paginacao=<?php echo $dado;
                                                $dado = $dado + 9; ?>"><?php echo $count + 1; ?></a></li>
                                                        <?php
                                                    endfor
                                                    ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Proximo </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div><!-- centerl meta -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } else { ?>
                <section>
                    <div class="gap gray-bg">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row" id="page-contents">
                                        <div class="col-lg-3">

                                        </div><!-- sidebar -->
                                        <div class="col-lg-12">
                                            <div class="central-meta">
                                                <div class="row">
                                                    <?php
                                                    $paginacao = htmlentities(filter_input(INPUT_GET, 'paginacao', FILTER_VALIDATE_INT));
                                                    if (empty($paginacao))
                                                        $paginacao = 0;
                                                    $fotos = MultimediaModel::findFotosAgente($agentePesquisado[0]->id, $paginacao);

                                                    foreach ($fotos as $key):
                                                        ?>
                                                        <div class="col-lg-4" >
                                                            <a class="strip" href="../Assets/images/upload/<?php echo $key->conteudo; ?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                                <img style="height:305px; width:405px; padding-top: 20px;" class="col-lg-12"    src="../Assets/images/upload/<?php echo $key->conteudo; ?>" alt=""></a>
                                                        </div>


                                                    <?php endforeach; ?>

                                                </div>

                                                <div class="lodmore"><button class="btn-view btn-load-more"></button></div>

                                            </div><!-- photos -->

                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-center">
                                                    <?php
                                                    $dado = 0;
                                                    for ($count = 0; $count < count(MultimediaModel::qtdFotos($agentePesquisado[0]->id)) / 9; $count++):
                                                        ?>
                                                        <li class="page-item"><a class="page-link" href="?paginacao=<?php echo $dado;
                                                $dado = $dado + 9; ?>"><?php echo $count + 1; ?></a></li>
                                                        <?php
                                                    endfor
                                                    ?>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#">Proximo </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div><!-- centerl meta -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>
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
