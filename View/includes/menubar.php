<?php
    require_once '../../Controller/AgenteController.php';
?>
<div class="topbar stick">
    <div class="logo">
        <a title="" href="../dashboard/"><img src="../Assets/images/logo.png" alt=""></a>
    </div>
    <div class="top-area">
        <ul class="nav-menu">
            <li>                
                    <form method="post">
                        <input type="text" placeholder="Encontre amigo" name="nome">
                        <input type="hidden" value="pesquisar" name="operacao">
                        <button data-ripple="" type="submit"><i class="ti-search"></i></button>
                    </form>
            </li>
            <li><a href="../dashboard/index.php" title="Inicio" data-ripple=""><i class="ti-home"></i></a></li>
            
            <li>
                <a href="../mensagem/" title="Mensagens" data-ripple=""><i class="ti-comment"></i><span>12</span></a>
                <div class="dropdowns">
                    <span>5 New Messages</span>
                    <ul class="drops-menu">
                        <li>
                            <a href="notifications.html" title="">
                                <img src="../Assets/images/resources/thumb-1.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>sarah Loren</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag green">New</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="../Assets/images/resources/thumb-2.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>Jhon doe</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag red">Reply</span>
                        </li>
                        <li>
                            <a href="../Assets/notifications.html" title="">
                                <img src="../Assets/images/resources/thumb-3.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>Andrew</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag blue">Unseen</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="../Assets/images/resources/thumb-4.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>Tom cruse</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag">New</span>
                        </li>
                        <li>
                            <a href="notifications.html" title="">
                                <img src="../Assets/images/resources/thumb-5.jpg" alt="">
                                <div class="mesg-meta">
                                    <h6>Amy</h6>
                                    <span>Hi, how r u dear ...?</span>
                                    <i>2 min ago</i>
                                </div>
                            </a>
                            <span class="tag">New</span>
                        </li>
                    </ul>
                    <a href="messages.html" title="" class="more-mesg">view more</a>
                </div>
            </li>
            
            <li>
                <span><b><?php echo strtoupper($_SESSION['agente']->username) ?></b></span>
            </li>
            
        </ul>
        
        <div class="user-img">
            <img src="../Assets/images/upload/<?php echo $_SESSION['agente']->foto ?>" width="60px" height="60px" alt="">
             <div class="user-setting">
                <a href="../perfil/index.php" ><i class="ti-user"></i> Perfil</a>
                <a href="#" title=""><i class="ti-settings"></i>Definição</a>
                <a href="#" title=""><i class="ti-power-off"></i>Sair</a>
            </div>
        </div>
    </div>
</div>