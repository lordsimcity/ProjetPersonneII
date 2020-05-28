<?php 
header ("Refresh: 2;URL=index.php");
// Redirection vers page_suivante.php après un délai de 2 secondes
?>


<html>
    <head>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body style='background:#fff;'>
        <div id="content">
            
            <a href='login.php'><span>Retour à la page précédente</span></a>
            
            <!-- tester si l'utilisateur est connecté -->
            <?php
                session_start();
                $user=$_SESSION['prenom'];
        echo "<br>Bonjour $user, vous êtes connecté</br>";
                
            ?>
            
        </div>
    </body>
</html>
