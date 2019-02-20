<div class="col-lg-10 col-sm-9">
    <div class="timeline-info">
        <ul>
            <li class="admin-name">
                <h5><?php 
                        if(!empty(filter_input(INPUT_GET, "id"))){
                              echo $agentePesquisado[0]->nome;
                        } else{
                              echo $_SESSION['agente']->nome;                    
                            }                                               
                    ?>
                </h5>
                <span><?php  
                        if(!empty(filter_input(INPUT_GET, "id"))){
                              echo $agentePesquisado[0]->email;
                        } else{
                              echo $_SESSION['agente']->email;                    
                            }                                                                   
                      ?>
                </span>
            </li>
            <li>
                <?php if(!empty(filter_input(INPUT_GET, "id"))){    
                    echo "<a class='' href='../perfil/?acao=".'verPerfil'."&id=".$agentePesquisado[0]->id_agente."' title='' data-ripple=''>Linha do Tempo</a>";
                } else { ?>
                    <a class="" href="../perfil/" title="" data-ripple="">Linha do tempo</a>
                <?php } ?>
                
                <?php if(!empty(filter_input(INPUT_GET, "id"))){    
                    echo "<a class='' href='../informação/?acao=".'verPerfil'."&id=".$agentePesquisado[0]->id_agente."' title='' data-ripple=''>Informações</a>";
                } else { ?>
                    <a class="" href="../informação/" title="" data-ripple="">Informações</a>
                <?php } ?>
                <!-- FOTOS -->
                <?php if(!empty(filter_input(INPUT_GET, "id"))){    
                    echo "<a class='' href='../perfil/fotos.php?acao=".'verPerfil'."&id=".$agentePesquisado[0]->id_agente."' title='' data-ripple=''>Fotos</a>";
                } else { ?>    
                    <a class="" href="../perfil/fotos.php" title="" data-ripple="">Fotos</a>
                <?php } ?>
                <!-- VIDEOS -->
                    
                    
                    <a class="" href="Videos.html" title="" data-ripple="">Videos</a>
                
                <?php if(!empty(filter_input(INPUT_GET, "id"))){    
                    echo "<a class='' href='../amigos/?acao=".'verPerfil'."&id=".$agentePesquisado[0]->id_agente."' title='' data-ripple=''>Amigos</a>";
                } else { ?>    
                    <a class="" href="../amigos/" title="" data-ripple="">Amigos</a>
                <?php } ?>    
                    
                    <a class="" href="pagina_utilizador.html" title="" data-ripple="">Loja</a>
            </li>
        </ul>
    </div>
</div>