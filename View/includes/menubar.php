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
                <a href="../mensagem/" title="Mensagens" data-ripple=""><i class="ti-comment"></i><span></span></a>
            </li>
            <li>
                <a href="../amigos/pedidosAmizade.php" title="Pedidos de amizade" data-ripple=""><i class="ti-user"></i><span><?php echo count(AmizadeModel::findPedidosAmizade($_SESSION['agente']->id)); ?></span></a>
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