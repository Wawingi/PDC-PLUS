<?php

session_start();
session_destroy();

//echo "teste Sessao".$_SESSION['dados_utilizador']->username;
//unset($_SESSION);

header("Location: ../inicio/");
return;
?>
