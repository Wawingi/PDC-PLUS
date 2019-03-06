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
            //require_once '../../Controller/PublicacaoController.php';
            //require_once '../../Controller/AgenteController.php';
            require_once '../../Controller/ProdutoController.php';
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

            
             
            <section>
                <div class="gap gray-bg">
                    <div class="container-fluid">
                        <?php
                            $info = filter_input(INPUT_GET,'info');                                                       
                            if($info!=null){
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Alerta!</strong> Formato invalido!!!
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php } ?>
                         
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row" id="page-contents">
                                    <div class="col-lg-3">
                                        <aside class="sidebar static">
                                            
                                           
                                        </aside>
                                    </div>
                                    <!-- Inicio Dos dados do produto -->    
                                    <div class="col-lg-6">
                                        <div class="central-meta">
                                            <div class="editing-info">
                                                <h5 class="f-title"><i class="ti-info-alt"></i> Efectuar Pagamento</h5>

                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="form-group">	
                                                        <input type="text" name="autor" required="required"/>
                                                        <label class="control-label" for="input">Nome Completo </label><i class="mtrl-select"></i>
                                                    </div>
                                                    <div class="form-group">	
                                                        <input type="text" name="autor" required="required"/>
                                                        <label class="control-label" for="input">Número da Conta </label><i class="mtrl-select"></i>
                                                    </div>
                                                    <div class="form-group">	
                                                        <input type="number" name="preco" required="required"/>
                                                        <label class="control-label" for="input">Chave Secreta</label><i class="mtrl-select"></i>
                                                    </div>
                                                    
                                                    <div class="form-group">	
                                                        <input type="hidden" name="operacao" value="registar_produto" required="required"/>
                                                    </div>
                                                    	
                                                    <div class="submit-btns">
                                                        <button type="button" class="mtr-btn"><span>Cancelar</span></button>
                                                        <button type="submit" class="mtr-btn"><span>Cadastrar</span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>	
                                    </div>
                                    
                                    
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
        <div class="side-panel">
            <h4 class="panel-title">General Setting</h4>
            
            <h4 class="panel-title">Account Setting</h4>
        </div><!-- side panel -->
        <script src="../Assets/js/main.min.js"></script>
        <script src="../Assets/js/script.js"></script>
    </body>
</html>
