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
                                                if (empty(filter_input(INPUT_GET, "id"))) { 
                                                    require_once '../includes/sidebareditar.php';
                                                }    
                                            ?>
                                            <!-- Fim do Sidebar Editar -->
                                        </aside>
                                    </div>
                                    
                                    <!-- Inicio Dos dados do Agente dono do perfil ou sessão -->
                                    <?php
                                        if (empty(filter_input(INPUT_GET, "id"))) {                                            
                                    ?>
                                    <div class="col-lg-6">
                                        <div class="central-meta">
                                            <div class="about">
                                                <div class="personal">
                                                    <h5 class="f-title"><i class="ti-info-alt"></i> Informação Pessoal</h5>
                                                    <p>
                                                        
                                                    </p>
                                                </div>
                                                <div class="d-flex flex-row mt-2">
                                                    <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link active" data-toggle="tab" >Informação Básica</a>
                                                        </li>
                                                        
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="basic" >
                                                            <ul class="basics">
                                                                <li><i class="ti-user"></i><?php echo $_SESSION['agente']->nome ?></li>
                                                                <li><i class="ti-map-alt"></i><?php echo $_SESSION['agente']->username ?></li>
                                                                <li><i class="ti-mobile"></i><?php echo $_SESSION['agente']->datanascimento ?></li>
                                                                <li><i class="ti-email"></i><?php echo $_SESSION['agente']->sexo ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><hr><br><br>
                                                <div class="d-flex flex-row mt-2">
                                                    <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link active" data-toggle="tab" >Endereço</a>
                                                        </li>
                                                        
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="basic" >
                                                            <ul class="basics">
                                                                <li><i class="ti-user"></i><?php echo $_SESSION['agente']->pais ?></li>
                                                                <li><i class="ti-map-alt"></i><?php echo $_SESSION['agente']->cidade ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><hr><br><br>
                                                <div class="d-flex flex-row mt-2">
                                                    <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link active" data-toggle="tab" >Contactos</a>
                                                        </li>
                                                        
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="basic" >
                                                            <ul class="basics">
                                                                <li><i class="ti-user"></i><?php echo $_SESSION['agente']->telefone ?></li>
                                                                <li><i class="ti-user"></i><?php echo $_SESSION['agente']->email ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                    <!-- Fim Dos dados do Agente -->
                                    <?php } else { ?>
                                    <!-- Inicio Dos dados do Agente pesquisado -->
                                    <div class="col-lg-6">
                                        <div class="central-meta">
                                            <div class="about">
                                                <div class="personal">
                                                    <h5 class="f-title"><i class="ti-info-alt"></i> Informação Pessoal</h5>
                                                    <p>
                                                        
                                                    </p>
                                                </div>
                                                <div class="d-flex flex-row mt-2">
                                                    <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link active" data-toggle="tab" >Informação Básica</a>
                                                        </li>
                                                        
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="basic" >
                                                            <ul class="basics">
                                                                <li><i class="ti-user"></i><?php echo $agentePesquisado[0]->nome ?></li>
                                                                <li><i class="ti-map-alt"></i><?php echo $agentePesquisado[0]->username ?></li>
                                                                <li><i class="ti-mobile"></i><?php echo  $agentePesquisado[0]->datanascimento ?></li>
                                                                <li><i class="ti-email"></i><?php echo $agentePesquisado[0]->sexo ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><hr><br><br>
                                                <div class="d-flex flex-row mt-2">
                                                    <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link active" data-toggle="tab" >Endereço</a>
                                                        </li>
                                                        
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="basic" >
                                                            <ul class="basics">
                                                                <li><i class="ti-user"></i><?php echo $agentePesquisado[0]->pais ?></li>
                                                                <li><i class="ti-map-alt"></i><?php echo $agentePesquisado[0]->cidade ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br><hr><br><br>
                                                <div class="d-flex flex-row mt-2">
                                                    <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
                                                        <li class="nav-item">
                                                            <a href="#" class="nav-link active" data-toggle="tab" >Contactos</a>
                                                        </li>
                                                        
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane fade show active" id="basic" >
                                                            <ul class="basics">
                                                                <li><i class="ti-user"></i><?php echo $agentePesquisado[0]->telefone ?></li>
                                                                <li><i class="ti-user"></i><?php echo $agentePesquisado[0]->email ?></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	
                                    </div>
                                    <!-- Fim Dos dados do Agente pesquisado -->
                                    <?php } ?>                                 
                                    <!-- Inicio Amigos mensagem -->
                                    <div class="col-lg-3">
                                        <aside class="sidebar static">
                                            <?php
                                                if (empty(filter_input(INPUT_GET, "id"))) { 
                                                    require_once '../includes/amigos.php';
                                                } else {
                                                    require_once '../includes/amigosdoagente.php';
                                                }
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
