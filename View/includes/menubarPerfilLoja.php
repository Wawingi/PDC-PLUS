<div class="col-lg-10 col-sm-9">
    <div class="timeline-info">
        <ul>
            <li class="admin-name">
                <h5><?php 
                        if(!empty(base64_encode(filter_input(INPUT_GET, "id")))){
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
                    echo "<a class='' href='../perfil/?acao=".'verPerfil'."&id=".base64_encode($agentePesquisado[0]->id_agente)."' title='' data-ripple=''>Linha do Tempo</a>";
                } else { ?>
                    <a class="" href="../perfil/" title="" data-ripple="">Linha do tempo</a>
                <?php } ?>
                
                <?php if(!empty(filter_input(INPUT_GET, "id"))){    
                    echo "<a class='' href='../informação/?acao=".'verPerfil'."&id=".base64_encode($agentePesquisado[0]->id_agente)."' title='' data-ripple=''>Informações</a>";
                } else { ?>
                    <a class="" href="../informação/" title="" data-ripple="">Informações</a>
                <?php } ?>
                <!-- FOTOS -->
                <?php if(!empty(filter_input(INPUT_GET, "id"))){    
                    echo "<a class='' href='../loja/?acao=".'verPerfil'."&id=".base64_encode($agentePesquisado[0]->id_agente)."' title='' data-ripple=''>Loja</a>";
                } else { ?>    
                    <a class="" href="../loja/" title="" data-ripple="">Loja</a>
                <?php } ?>
            </li>
        </ul>
    </div>
</div>