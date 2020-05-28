<?php
session_start();
if(empty($_SESSION['login'])){
    header("location:login.php");
}

$date=date("d-m-Y H:i:s");
if(isset($_GET['langue'])){
    $langue=$_GET["langue"];
}


setcookie("langue","$langue",time()+3600,'/');
setcookie("date","$date",time()+3600,'/');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link href="styleindex.css" rel="stylesheet"/>

</head>

<body>
    <form action="logout.php" method="GET">
    <input type="submit" name="deconnexion" value="Déconnexion"/>
    </form>
    <p> Nombre de visites :<span id='visites'></span> </p>
    <?php 
    echo $_COOKIE["date"];
    ?>
<!-- Header -->
<div class="header">
    <!-- Image -->
    <img class="image" src="https://chocobonplan.com/wp-content/uploads/2018/11/dessous-de-verre-playstation.jpg"/>
    
    <!-- Text-->
    <div>
        <h1>Bienvenue
        <?php $user=$_SESSION['prenom'];
        echo "$user";
?>
        </h1>
    </div>
</div>

<!-- Menu -->
<div class="menu">
	    <div class="menuItem"><a href="jeux.php"> JEUX </a></div>
    <div class="menuItem"><a href="consoles.php"> CONSOLES </a></div>
    <div class="menuItem"><a href="figurines.php"> FIGURINES </a></div>
</div>

    <script type="text/javascript">
//Detection
if(typeof localStorage!='undefined') {
	//Récupération de la valeur dans web storage
	var nbvisites=localStorage.getItem('visites');
	//Vérification de la présence du compteur
	if(nbvisites!=null) {
		// Si oui, on convertit en nombre entier la chaine de texte qui fut stockée
		nbvisites = parseInt(nbvisites);
}
else {
	nbvisites=1;
}
	//Incrémentation
nbvisites++;
localStorage.setItem('visites',nbvisites);
//Affichage dans la page
document.getElementById('visites').innerHTML= nbvisites;
}
else {
	alert("localStorage n'est pas supporté");
}
</script>

<form method="get" action ="index.php">
<select name ='langue'>
<option value="Eng" <?php if ($_GET['langue'] == Eng){echo "selected";}?> >Anglais</option>
<option value="Fr" <?php if ($_GET['langue'] == Fr){echo "selected";}?> >Français</option>
<option value="Sp" <?php if ($_GET['langue'] == Sp){echo "selected";}?>>Espagnol </option>
</select>
<input type="submit" value="Confirmer"/>
</form>


</body>

</html>
