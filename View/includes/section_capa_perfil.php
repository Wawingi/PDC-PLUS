<?php
    //Foto capa e perfl do dono da sessão
    if (empty(filter_input(INPUT_GET, "id"))) {
?>
<section>
    <div class="feature-photo">
        <figure>
            <a class="strip" href="../Assets/images/upload/<?php echo $_SESSION['agente']->capa; ?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                <img src="../Assets/images/upload/<?php
                echo $_SESSION['agente']->capa;
                ?>" style="height:434px; width:1580px;"alt=""></a>
        </figure>
        <form class="edit-phto" method='post' action="../includes/upload_foto.php" enctype='multipart/form-data'>
            <i class="fa fa-camera-retro"></i>
            <label class="fileContainer">
                Selecionar foto
                <input type="file" required="" name="foto_capa"/>
            </label>
            <button type="submit" name="foto_capa"  >Alterar</button>

        </form>
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>

                            <a class="strip" href="../Assets/images/upload/<?php echo $_SESSION['agente']->foto; ?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                <img src="../Assets/images/upload/<?php echo $_SESSION['agente']->foto; ?>" style="height:150px; width:299px;" alt="">
                            </a>
                            <form class="edit-phto" method='post' action="../includes/upload_foto.php" enctype='multipart/form-data'>
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Selecionar foto
                                    <input  name="enviarFoto" type="hidden"/>
                                    <input type="file" name="foto_perfil" required="" />
                                    <br>
                                    <button type="submit" name="foto_perfil"  >Alterar</button>

                                </label>
                            </form>
                        </figure>
                    </div>
                </div>
                <!-- Inicio menubar do perfil -->
                <?php
                    if($_SESSION['agente']->tipo=='Individual'){
                        require_once '../includes/menubarPerfil.php';
                    }else{
                        require_once '../includes/menubarPerfilLoja.php';
                    }
                ?>
                <!-- Inicio menubar do perfil -->
            </div>
        </div>
    </div>
</section>
<?php } else { ?>
<section>
    <div class="feature-photo">
        <figure>
            <a class="strip" href="../Assets/images/upload/<?php echo $agentePesquisado[0]->capa; ?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                <img src="../Assets/images/upload/<?php
                echo $agentePesquisado[0]->capa;
                ?>" style="height:434px; width:1580px;"alt=""></a>
        </figure>
     
        <div class="container-fluid">
            <div class="row merged">
                <div class="col-lg-2 col-sm-3">
                    <div class="user-avatar">
                        <figure>
                            <a class="strip" href="../Assets/images/upload/<?php echo $agentePesquisado[0]->foto; ?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                <img src="../Assets/images/upload/<?php echo $agentePesquisado[0]->foto; ?>" style="height:150px; width:299px;" alt="">
                            </a>
                            
                        </figure>
                    </div>
                </div>
                <!-- Inicio menubar do perfil -->
                <?php
                    $tipo= filter_input(INPUT_GET, 'tipo');
                    if($tipo=='Individual'){
                        require_once '../includes/menubarPerfil.php';
                    }else{
                        require_once '../includes/menubarPerfilLoja.php';
                    }
                ?>
                <!-- Inicio menubar do perfil -->
            </div>
        </div>
    </div>
</section>
<?php } ?>
