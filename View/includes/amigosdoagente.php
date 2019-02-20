<!--Mostra os amigos de um determinado agente-->
<div class="widget friend-list stick-widget">
    <h4 class="widget-title">Amigos do (a): <?php echo $agentePesquisado[0]->username ?></h4>
    <div id="searchDir"></div>
    <ul id="people-list" class="friendz-list">
        <?php
            $amizade = new AmizadeModel();
            foreach ($amizade->findAmigos($agentePesquisado[0]->id) as $valor):
        ?>
        <li>
            <figure>
                <img src="../Assets/images/upload/<?php echo $valor->foto ?>" alt="">
            </figure>
            <div class="friendz-meta">
                <a href="#"><?php echo $valor->nome ?></a>
                <i><?php echo $valor->cidade ?></i>
            </div>
        </li>
        <?php endforeach;  ?>
    </ul>
</div>