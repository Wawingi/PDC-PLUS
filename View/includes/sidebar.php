<?php if($_SESSION['agente']->tipo=='Individual'){ ?>
<div class="widget">
    <h4 class="widget-title">Atalhos</h4>
    <ul class="naves">
        <li>
            <i class="ti-clipboard"></i>
            <a href="../perfil/" title="">Perfil</a>
        </li>
        <li>
            <i class=" ti-hand-open"></i>
            <a href="../amigos/sugestaoAmigo.php" title="">Sugestão de Amizade</a>
        </li>
        <li>
            <i class="ti-user"></i>
            <a href="../amigos/pedidosAmizade.php" title="">Pedidos de Amizade</a>
        </li>
        <li>
            <i class="ti-comments-smiley"></i>
            <a href="../mensagem/" title="">Mensages</a>
        </li>
        <li>
            <i class="ti-power-off"></i>
            <a href="../includes/TerminarSessao.php" title="">Sair</a>
        </li>
    </ul>
</div>
<?php }else{ ?>
<div class="widget">
    <h4 class="widget-title">Atalhos</h4>
    <ul class="naves">
        <li>
            <i class="ti-clipboard"></i>
            <a href="../loja/" title="">Perfil</a>
        </li>
        <li>
            <i class="ti-comments-smiley"></i>
            <a href="../mensagem/" title="">Mensages</a>
        </li>
        <li>
            <i class="ti-power-off"></i>
            <a href="../includes/TerminarSessao.php" title="">Sair</a>
        </li>
    </ul>
</div>
<?php } ?>
