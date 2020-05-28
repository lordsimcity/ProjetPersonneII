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
catch (PDOException $e) {
    echo "Connection error : ".$e->getMessage();
}
#$connection=null;


if(isset($_POST['submit'])){
    
    //Retrieve the field values from our login form.
    $mail =trim($_POST['mail']);
    $password =trim($_POST['password']);
    //Retrieve the user account information for the given username.
    $query = "SELECT email, COUNT(email), password, prenomUtilisateur FROM UTILISATEUR WHERE email = '".$mail."'";
    $resultat=$connection->query($query);
    $ligne=$resultat->fetch();
    $count=$ligne['COUNT(email)'];
    
    if($count==0){
        //Could not find a user with that mail
        echo "<script>alert(\"Cet email n'existe pas\")</script>";
    }
    
    else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        //Compare the passwords.
        $mdp = $ligne['password'];
        $validPassword = password_verify($password, $mdp);
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Provide the user with a login session.
            //Ouverture de session.
            session_start();
            $_SESSION['login'] = $mail;
            $_SESSION['prenom']=$ligne['prenomUtilisateur'];
            
            //Redirect to our protected page
            header("Location: principale.php");
        }
        else{
            echo "<script>alert(\"Mot de passe incorrect\")</script>";
        }
    }
    
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>
 <div id="container">
            
            <form action="login.php" method="POST">
                <h1>Connexion</h1>
                
                <label><b>Email</b></label>
                <input type="text" placeholder="Entrer votre mail" name="mail" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                <input type="submit" id='submit' value="S'identifier" name="submit" >
              
				<a href=inscription.php>Inscription</a>
             </form>
        </div>

</body>
</html>
