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
		<div class="feature-photo">
			<figure><img alt="" src="../Assets/images/resources/timeline-4.jpg"></figure>
			<div class="add-btn">
				<span>1.3k Seguidores</span>
				<a data-ripple="" title="" href="page-likers.html#">Seguir</a>
			</div>
			<form class="edit-phto">
				<i class="fa fa-camera-retro"></i>
				<label class="fileContainer">
					Editar foto de Capa
				<input type="file">
			</label>
			</form>
			<div class="container-fluid">
				<div class="row merged">
					<div class="col-lg-2 col-sm-3">
						<div class="user-avatar">
							<figure>
								<img alt="" src="../Assets/images/resources/user-avatar2.jpg">
								<form class="edit-phto">
									<i class="fa fa-camera-retro"></i>
									<label class="fileContainer">
										Editar foto de perfil
										<input type="file">
									</label>
								</form>
							</figure>
						</div>
					</div>
					<div class="col-lg-10 col-sm-9">
						<div class="timeline-info">
							<ul>
								<li class="admin-name">
								  <h5><?php echo $_SESSION['agente']->nome; ?></h5>
								  <span>@amazonshop</span>
								</li>
								<li>
                  <a data-ripple="" title="" href="Pagina.html" class="">Pagina</a>
                  <a data-ripple="" title="" href="Notificações.html">Notificações</a>
                  <a data-ripple="" title="" href="Mensagem.html" class="">Mensagens</a>
                  <a data-ripple="" title="" href="Estatisticas.html" class="">Estatisticas</a>
                  <a data-ripple="" title="" href="Seguidores.html" class="active">Seguidores</a>
                  <a data-ripple="" title="" href="Definições.html">Definições</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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
                                    <div class="col-lg-6">
                                        <div class="central-meta item">
                                            <div class="new-postbox">
                                                <figure>
                                                    <img src="../Assets/images/upload/padrao.png" alt="">
                                                </figure>
                                                <?php ?>
                                                <div class="newpst-input">
                                                    <form method="post">
                                                        <textarea rows="2" name="conteudo" placeholder="Escreva aqui a sua publicação!!! "></textarea>
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
                                        <div class="central-meta item">
                                            <div class="user-post">
                                                <div class="friend-info">
                                                    <figure>
                                                        <img src="../Assets/images/resources/friend-avatar10.jpg" alt="">
                                                    </figure>
                                                    <div class="friend-name">
                                                        <ins><a href="time-line.html" title=""><?php echo $_SESSION['agente']->nome; ?></a></ins>
                                                        <span>publicado: june,2 2018 19:PM</span>
                                                    </div>
                                                    <div class="post-meta">
                                                        <img src="../Assets/images/resources/user-post.jpg" alt="">
                                                        <div class="we-video-info">
                                                            <ul>
                                                                <li>
                                                                    <span class="comment" data-toggle="tooltip" title="Comentários">
                                                                        <i class="fa fa-comments-o"></i>
                                                                        <ins>52</ins>
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
                                                        <div class="description">
                                                            <p>
                                                                Curabitur world's most beautiful car in <a href="time-line.html#" title="">#test drive booking !</a> the most beatuiful car available in america and the saudia arabia, you can book your test drive by our official website
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="coment-area">
                                                    <ul class="we-comet">
                                                        <li>
                                                            <div class="comet-avatar">
                                                                <img src="../Assets/images/resources/comet-1.jpg" alt="">
                                                            </div>
                                                            <div class="we-comment">
                                                                <div class="coment-head">
                                                                    <h5><a href="time-line.html" title="">Jason borne</a></h5>
                                                                    <span>1 year ago</span>
                                                                    <a class="we-reply" href="time-line.html#" title="Reply"><i class="fa fa-reply"></i></a>
                                                                </div>
                                                                <p>we are working for the dance and sing songs. this car is very awesome for the youngster. please vote this car and like our post</p>
                                                            </div>

                                                        </li>
                                                        <li>
                                                            <div class="comet-avatar">
                                                                <img src="../Assets/images/resources/comet-1.jpg" alt="">
                                                            </div>
                                                            <div class="we-comment">
                                                                <div class="coment-head">
                                                                    <h5><a href="time-line.html" title="">Donald Trump</a></h5>
                                                                    <span>1 week ago</span>
                                                                    <a class="we-reply" href="time-line.html#" title="Reply"><i class="fa fa-reply"></i></a>
                                                                </div>
                                                                <p>we are working for the dance and sing songs. this video is very awesome for the youngster. please vote this video and like our channel
                                                                    <i class="em em-smiley"></i>
                                                                </p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <a href="time-line.html#" title="" class="showmore underline">more comments</a>
                                                        </li>
                                                        <li class="post-comment">
                                                            <div class="comet-avatar">
                                                                <img src="images/resources/comet-1.jpg" alt="">
                                                            </div>
                                                            <div class="post-comt-box">

                                                                <form method="post">
                                                                    <textarea placeholder="Escreva o teu comentário"></textarea>                                                

                                                                </form>

                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
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
