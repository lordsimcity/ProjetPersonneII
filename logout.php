<?php
session_start();
if($_GET['deconnexion']){
    session_destroy();
    unset($_SESSION['mail']);
    unset($_SESSION['prenom']);
    header("location:login.php");
}
?>