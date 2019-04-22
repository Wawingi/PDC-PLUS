<!DOCTYPE html>
<?php
require_once '../../Controller/Autenticacao_inicio.php';

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
        <title>Pdc-Plus</title>

        <link rel="icon" href="../Assets/images/fav.png" type="image/png" sizes="16x16">
        <link href="../Assets/css/main.min.css" rel="stylesheet" type="text/css"/>
        <link href="../Assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="../Assets/css/color.css" rel="stylesheet" type="text/css"/>
        <link href="../Assets/css/responsive.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <?php
        require_once '../../Controller/AgenteController.php';
        ?>
        <!--<div class="se-pre-con"></div>-->
        <?php
            $info = base64_decode(filter_input(INPUT_GET, 'info'));
            if ($info != null) {
        ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Alerta!</strong> <?php echo $info ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        <?php
            $info1 = base64_decode(filter_input(INPUT_GET, 'info1'));
            if ($info1 != null) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucesso!</strong> <?php echo $info1 ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
        
        <div class="theme-layout">
            <div class="container-fluid pdng0">
                <div class="row merged">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="land-featurearea">
                            <div class="land-meta">
                                <h1>PDC PLUS</h1>
                                <p>
                                    Junte-se a nós e conectamos o seu negócio aos clientes certos.
                                </p>
                                <div class="friend-logo">
                                    <a href="index.php"><span><img src="../Assets/images/wink.png" alt=""></span></a>
                                </div>
                                <a href="#" title="" class="folow-me">Siga-nos</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="login-reg-bg">
                            <div class="log-reg-area sign">
                                <h2 class="log-title">Login</h2>
                                <p>
                                    Não usa o PDC PLUS? <a href="landing.html#" title="">Junta-te a nós.</a>
                                </p>
                                <!-- Formulario de Login de um Agente -->
                                <?php require_once './formLoginAgente.php'; ?>
                                <!-- Fim do Formulario de registo de um Agente -->
                            </div>

                            <div class="log-reg-area reg">
                                <h2 class="log-title">Registar</h2>
                                <p>
                                    Ja possui uma conta? <a href="landing.html#" class="already-have" title="">Entrar</a>
                                </p>

                                <!-- Formulario de registo de um Agente -->
                                <?php require_once './formRegistarAgente.php'; ?>
                                <!-- Fim do Formulario de registo de um Agente -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../Assets/js/main.min.js" type="text/javascript"></script>
        <script src="../Assets/js/script.js" type="text/javascript"></script>
    </body>
</html>
