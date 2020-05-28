<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

//function VerifierAdresseMail($email) {
//   return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email)) ? false : true;
//}

function check_mdp_format($mdp) {
    $majuscule = preg_match('@[A-Z]@', $mdp);
    $minuscule = preg_match('@[a-z]@', $mdp);
    $chiffre = preg_match('@[0-9]@', $mdp);
    
    if (!$majuscule or !$minuscule or !$chiffre or strlen($mdp) < 8) {
        return false;
    }
    else {
        return true;
    }
}


if(isset($_POST['submit'])){//l'utilisateur à cliqué sur "S'inscrire", on demande donc si les champs sont défini avec "isset"
    $nom=trim($_POST['formNom']);
    $prenom=trim($_POST['formPrenom']);
    $email=trim($_POST['formMail']);
    $pass1=$_POST['formPassword'];
    $pass2=$_POST['formPassword2'];
    if(empty($_POST['formNom'])){//le champ nom est vide, on arrête l'exécution du script et on affiche un message d'erreur
        echo "<script>alert(\"Le nom n'est pas renseigné\")</script>";
        
    } elseif(empty($_POST['formPrenom'])){//le champ prenom est vide, on arrête l'exécution du script et on affiche un message d'erreur
        echo "<script>alert(\"Le prénom n'est pas renseigné\")</script>";
        
    }      elseif(empty($_POST['formMail'])){//le champ mail est vide, on arrête l'exécution du script et on affiche un message d'erreur
        echo "<script>alert(\"Le mail n'est pas renseigné\")</script>";
        
    }     elseif(empty($_POST['formPassword'])){//le champ prenom est vide, on arrête l'exécution du script et on affiche un message d'erreur
        echo "<script>alert(\"Le mot de passe n'est pas renseigné\")</script>";
        
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) ){
        echo "<script>alert(\"{$email} n'est pas une adresse email valide\")</script>";
    }
    
    
    elseif(check_mdp_format($_POST['formPassword'])==false){//le champ mot de passe n'est pas conforme
        echo "<script>alert(\"Format du mot de passe incorrect \")</script>";
        
    } elseif($pass1!=$pass2){//on vérifie les mots de passe correspondent
        echo "<script>alert(\"Les mots de passe ne sont pas identiques\")</script>";
        
    }
    else {
        $hash=password_hash(($_POST['formPassword']), PASSWORD_DEFAULT);
        
        $query="INSERT INTO UTILISATEUR(email,nomUtilisateur,prenomUtilisateur,password) VALUES('".($email)."','".($nom)."','".($prenom)."','".($hash)."');";
        $connection->query($query);
        echo "<script>alert(\"Enregistrement effectué, vous allez être redirigé sur la page de connexion\")</script>";
        header("Refresh: 0;URL=login.php");
        $connection=null;
    }
    
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Inscription</title>
<link rel="stylesheet" href="stylesheet.css"/>
</head>
<body>

<div class="carre">
<form id="formRegister" name="formRegister" action="inscription.php" method="POST">

<label> Nom : </label>
<input type="text"  name="formNom"/>



<label> Prénom :</label>
<input type="text" name="formPrenom"/>

<label> Mail :</label>
<input type="text"  name="formMail"/>

<label> Mot de passe :</label>
<input type="password"  name="formPassword"/>



<label> Confirmation mot de passe: </label>
<input type="password"  name="formPassword2"/>



<input id="enregistrer" type="submit" name="submit" value="Enregistrer"/>
</form>
<p id="enregistrer">Déjà inscrit ? <a  href='login.php'>Connectez vous</a></p>
</div>


</body>
</html>