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
        
        <?php require_once '../../Controller/TrocasenhaController.php'; ?>
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

                <nav id="shoppingbag">
                    <div>
                        <div class="">
                            <form method="post">
                                <div class="setting-row">
                                    <span>use night mode</span>
                                    <input type="checkbox" id="nightmode"/>
                                    <label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
                                </div>
                                <div class="setting-row">
                                    <span>Notifications</span>
                                    <input type="checkbox" id="switch2"/>
                                    <label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
                                </div>
                                <div class="setting-row">
                                    <span>Notification sound</span>
                                    <input type="checkbox" id="switch3"/>
                                    <label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
                                </div>
                                <div class="setting-row">
                                    <span>My profile</span>
                                    <input type="checkbox" id="switch4"/>
                                    <label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
                                </div>
                                <div class="setting-row">
                                    <span>Show profile</span>
                                    <input type="checkbox" id="switch5"/>
                                    <label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
                                </div>
                            </form>
                            <h4 class="panel-title">Account Setting</h4>
                            <form method="post">
                                <div class="setting-row">
                                    <span>Sub users</span>
                                    <input type="checkbox" id="switch6" />
                                    <label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
                                </div>
                                <div class="setting-row">
                                    <span>personal account</span>
                                    <input type="checkbox" id="switch7" />
                                    <label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
                                </div>
                                <div class="setting-row">
                                    <span>Business account</span>
                                    <input type="checkbox" id="switch8" />
                                    <label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
                                </div>
                                <div class="setting-row">
                                    <span>Show me online</span>
                                    <input type="checkbox" id="switch9" />
                                    <label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
                                </div>
                                <div class="setting-row">
                                    <span>Delete history</span>
                                    <input type="checkbox" id="switch10" />
                                    <label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
                                </div>
                                <div class="setting-row">
                                    <span>Expose author name</span>
                                    <input type="checkbox" id="switch11" />
                                    <label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
                                </div>
                            </form>
                        </div>
                    </div>
                </nav>
            </div><!-- responsive header -->

            <!-- inicio do menubar -->
            <?php
                require_once '../includes/menubar.php';
            ?>
            
            <!-- FIM do menubar -->    

            <section>
                <div class="feature-photo">
                    <figure><img src="../Assets/images/resources/timeline-1.jpg" alt=""></figure>
                    
                    <form class="edit-phto">
                        <i class="fa fa-camera-retro"></i>
                        <label class="fileContainer">
                            Alterar foto de capa
                            <input type="file"/>
                        </label>
                    </form>
                    <div class="container-fluid">
                        <div class="row merged">
                            <div class="col-lg-2 col-sm-3">
                                <div class="user-avatar">
                                    <figure>
                                        <img src="../Assets/images/upload/padrao.png" alt="">
                                        <form class="edit-phto">
                                            <i class="fa fa-camera-retro"></i>
                                            <label class="fileContainer">
                                                Alterar foto de perfil
                                                <input type="file"/>
                                            </label>
                                        </form>
                                    </figure>
                                </div>
                            </div>
                            <!-- Inicio menubar do perfil -->
                            <?php
                            require_once '../includes/menubarPerfil.php';
                            ?>
                            <!-- Inicio menubar do perfil -->
                        </div>
                    </div>
                </div>
            </section><!-- top area -->

            <section>
                <div class="gap gray-bg">
                    <div class="container-fluid">
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
                                            require_once '../includes/sidebareditar.php';
                                            ?>
                                            <!-- Fim do Sidebar Editar -->
                                        </aside>
                                    </div>
                                    
                                    <!-- Formulario de editar dados pessoais -->
                                    <div class="col-lg-6">
                                        <div class="central-meta">
                                            <div class="editing-info">
                                                <h5 class="f-title"><i class="ti-lock"></i> Editar Senha</h5>

                                                <form method="post">
                                                    <div class="form-group">	
                                                        <input type="password" name="senha_antiga" required="required"/>
                                                        <label class="control-label" for="input">Senha Antiga</label><i class="mtrl-select"></i>
                                                    </div>
                                                    <div class="form-group">	
                                                        <input type="password" name="senha_nova" required="required"/>
                                                        <label class="control-label" for="input">Senha Nova</label><i class="mtrl-select"></i>
                                                    </div>
                                                    <div class="form-group">	
                                                        <input type="password" name="senha_nova_confirmar" required="required"/>
                                                        <label class="control-label" for="input">Confirmar a Senha</label><i class="mtrl-select"></i>
                                                    </div>
                                                    <input type="hidden" name="operacao" value="alterar_senha" required="required"/>
                            
                                                    <div class="submit-btns">
                                                        <button type="button" class="mtr-btn"><span>Cancelar</span></button>
                                                        <button type="submit" class="mtr-btn"><span>Actualizar</span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>	
                                    </div>

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
        <div class="side-panel">
            <h4 class="panel-title">General Setting</h4>
            <form method="post">
                <div class="setting-row">
                    <span>use night mode</span>
                    <input type="checkbox" id="nightmode1"/>
                    <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Notifications</span>
                    <input type="checkbox" id="switch22" />
                    <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Notification sound</span>
                    <input type="checkbox" id="switch33" />
                    <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>My profile</span>
                    <input type="checkbox" id="switch44" />
                    <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Show profile</span>
                    <input type="checkbox" id="switch55" />
                    <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
                </div>
            </form>
            <h4 class="panel-title">Account Setting</h4>
            <form method="post">
                <div class="setting-row">
                    <span>Sub users</span>
                    <input type="checkbox" id="switch66" />
                    <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>personal account</span>
                    <input type="checkbox" id="switch77" />
                    <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Business account</span>
                    <input type="checkbox" id="switch88" />
                    <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Show me online</span>
                    <input type="checkbox" id="switch99" />
                    <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Delete history</span>
                    <input type="checkbox" id="switch101" />
                    <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
                </div>
                <div class="setting-row">
                    <span>Expose author name</span>
                    <input type="checkbox" id="switch111" />
                    <label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
                </div>
            </form>
        </div><!-- side panel -->
        <script src="../Assets/js/main.min.js"></script>
        <script src="../Assets/js/script.js"></script>
    </body>
</html>
