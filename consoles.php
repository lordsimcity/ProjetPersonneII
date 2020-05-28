<?php
session_start();
if(empty($_SESSION['login'])){
    header("location:login.php");
}
$server="localhost";
$user="iris";
$pass="password";
$db="projetpersonnelSW";
try{
    $connection= new PDO("mysql:host=$server; dbname=$db", $user, $pass);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
    
}
$query="SELECT * FROM CONSOLE";
$result=$connection->query($query);

$alpha="SELECT prixConsole,nomConsole,imageConsole FROM CONSOLE ORDER BY nomConsole";
$trialpha=$connection->query($alpha);

$croissant="SELECT * FROM CONSOLE ORDER BY prixConsole,nomConsole ";
$filtrecroissant=$connection->query($croissant);

$decroissant="SELECT * FROM CONSOLE ORDER BY prixConsole DESC ";
$filtredecroissant=$connection->query($decroissant);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>consoles</title>
    <link href="styleindex.css" rel="stylesheet"/>
</head>

<body>
    <form action="logout.php" method="GET">
    <input type="submit" name="deconnexion" value="Déconnexion"/>
    </form>
    <?php echo $_COOKIE['date'];?>
<!-- Header -->
<div class="header">
    <!-- Image -->
    <img class="image" src="https://chocobonplan.com/wp-content/uploads/2018/11/dessous-de-verre-playstation.jpg"/>
    <!-- Text-->
</div>

<!-- Menu -->
<div class="menu">
	<div class="menuItem"><a href="index.php"> MENU </a></div>
    <div class="menuItem"><a href="jeux.php"> JEUX </a></div>
    <div class="menuItem"><a href="consoles.php"> CONSOLES </a></div>
    <div class="menuItem"><a href="figurines.php"> FIGURINES </a></div>
</div>

<div class="jeux">
<form method="post" action ="consoles.php">
<select name ='tri'>
<option value=""> --Trier-- </option>
<option value="1" <?php if ($_POST['tri'] == 1){echo "selected";}?> >Alphabétique</option>
<option value="2" <?php if ($_POST['tri'] == 2){echo "selected";}?>>Prix croissant</option>
<option value="3" <?php if ($_POST['tri'] == 3){echo "selected";}?>>Prix décroissant </option>
</select>
<input type="submit" value="Confirmer"/>
</form>

<?php 
if(isset($_POST['tri'])){
    $tri=$_POST['tri'];
    
    if($tri==2){
        foreach($filtrecroissant as $row){
        echo "<div>";
        echo"<img src='".$row['imageConsole']."'/>";
        echo "<h1>".$row['nomConsole']."</h1>";
        echo "<p class='prix'>".$row['prixConsole']."€</p>";
        echo "</div>";
    }      
  }
  
    else if ($tri==1){
        foreach($trialpha as $row){
            echo "<div>";
            echo"<img src='".$row['imageConsole']."'/>";
            echo "<h1>".$row['nomConsole']."</h1>";
            echo "<p class='prix'>".$row['prixConsole']."€</p>";
            echo "</div>";
        }
    }
    
    else if ($tri==3){
        foreach($filtredecroissant as $row){
            echo "<div>";
            echo"<img src='".$row['imageConsole']."'/>";
            echo "<h1>".$row['nomConsole']."</h1>";
            echo "<p class='prix'>".$row['prixConsole']."€</p>";
            echo "</div>";
        }
    }
}
    else{foreach($result as $row){
    echo "<div>";
    echo"<img src='".$row['imageConsole']."'/>";
    echo "<h1>".$row['nomConsole']."</h1>";
    echo "<p class='prix'>".$row['prixConsole']."€</p>";
    echo "</div>";
    }
}
?>

</div>
</body>
</html>
