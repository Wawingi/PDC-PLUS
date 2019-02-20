<?php
session_start();
if (isset($_SESSION['agente'])) {
    //echo "<pre>".session_id();
    //var_dump($_SESSION);
    //echo "não existe";
   // header("Location: View/inicio/");
    //return ;
}else {
    header("Location: ../View/inicio/");
 }
//exit();
