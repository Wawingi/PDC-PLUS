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
                                    <!-- Inicio Publicação -->

                                    <div class="col-lg-6">
                                        <div class="loadMore">
                                            <div class="central-meta item">
                                                <div class="new-postbox">
                                                    <figure>
                                                        <img src="../Assets/images/upload/<?php echo $_SESSION['agente']->foto; ?>" style="height:60px; width:60px;" alt="">
                                                    </figure>
                                                    <?php ?>
                                                    <div class="newpst-input">
                                                        <form method="post" enctype='multipart/form-data'>
                                                            <textarea rows="2" name="conteudo" required="" placeholder="Escreva aqui a sua publicação!!! "></textarea>
                                                            <div class="attachments">
                                                                <ul>
                                                                    <li>
                                                                        <select class="custom-select mt-3" name="permissao">
                                                                            <option selected>Publico</option>
                                                                            <option>Privado</option>
                                                                        </select>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-image"></i>
                                                                        <label class="fileContainer">
                                                                            <input type="file" name="imagem">
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-video-camera"></i>
                                                                        <label class="fileContainer">
                                                                            <input type="file" name="video">
                                                                        </label>
                                                                    </li>
                                                                    <li>
                                                                        <input type="hidden" value="<?php echo $_SESSION['agente']->id; ?>" name="id_Agente">
                                                                        <input type="hidden" value="publicar" name="operacao">
                                                                        <button type="submit">Publicar</button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div><!-- add post new box -->

                                            <?php
                                            $publicacao = new PublicacaoModel();
                                            foreach ($publicacao->findAllPublicacaoAmigos() as $valor):
                                                ?>
                                                <div class="central-meta item">
                                                    <div class="user-post">
                                                        <div class="friend-info">
                                                            <figure>
                                                                <img src="../Assets/images/upload/<?php echo $valor->foto; ?>" style="height:50px; width:60px;" alt="">
                                                            </figure>
                                                            <div class="friend-name">
                                                                <ins><a href="time-line.html" title=""><?php echo $valor->nome; ?></a></ins>
                                                                <span>publicado: <?php echo $valor->data; ?></span>
                                                            </div>
                                                            <div class="post-meta">
                                                                <a class="strip" href="../Assets/images/upload/<?php echo $valor->midia; ?>" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
                                                                    <img src="../Assets/images/upload/<?php echo $valor->midia; ?>"  alt=""
                                                                    <?php if (!empty($valor->midia)) echo 'style="height:334px; width:744px;"'; ?>
                                                                         >                                                         </a>
                                                                <div class="description">
                                                                    <p>
                                                                        <?php echo $valor->conteudo; ?>
                                                                    </p>
                                                                </div>
                                                                <div class="we-video-info">
                                                                    <ul>
                                                                        <li>
                                                                            <span class="comment" data-toggle="tooltip" title="Comentários">
                                                                                <i class="fa fa-comments-o"></i>
                                                                                <ins><?php echo count(PublicacaoModel::comentariosPublicacao($valor->id, 0)); ?></ins>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="like" data-toggle="tooltip" title="Gostos">
                                                                                <i class="ti-heart"></i>
                                                                                <ins>2.2k</ins>
                                                                            </span>
                                                                        </li>
                                                                        <li>
                                                                            <span class="dislike" data-toggle="tooltip" title="Não gostos">
                                                                                <i class="ti-heart-broken"></i>
                                                                                <ins>200</ins>
                                                                            </span>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="coment-area">
                                                            <ul class="we-comet">
                                                                <?php
                                                                $publicacao = new PublicacaoModel();
                                                                foreach ($publicacao->comentariosPublicacao($valor->id) as $dado):
                                                                    ?>
                                                                    <li>
                                                                        <div class="comet-avatar">
                                                                            <img src="../Assets/images/upload/<?php echo $dado->foto; ?>"  style="height:50px; width:50px;" alt="">
                                                                        </div>
                                                                        <div class="we-comment">
                                                                            <div class="coment-head">
                                                                                <h5><a href="time-line.html" title=""><?php echo $dado->nome; ?></a></h5>
                                                                                <span><?php echo $dado->data; ?></span>
                                                                                
                                                                            </div>
                                                                            <p><?php echo $dado->conteudo; ?>
                                                              
                                                                            </p>
                                                                        </div>
                                                                    </li>
                                                                <?php endforeach; ?>

                                                                <li class="post-comment">
                                                                    <div class="comet-avatar">
                                                                        <img src="images/resources/comet-1.jpg" alt="">
                                                                    </div>
                                                                    <div class="post-comt-box">

                                                                        <form method="post" >
                                                                            <textarea placeholder="Comentar" required="" name="conteudo_comentario"></textarea>
                                                                            <div class="add-smiles">
                                                                                <button href="?operacao=comentar" style="color: blue; bottom: -8px" type="submit" name="registar" class="fa fa-send"/>                                                                                
                                                                                <input type="hidden" value="comentar" name="operacao">
                                                                                <input type="hidden" value="<?php echo $_SESSION['agente']->id; ?>" name="id_agente">
                                                                                <input type="hidden" value="<?php echo $valor->id_publicacao; ?>" name="id_publicacao">
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
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
