<?php

require_once 'classes/user.php';
require_once 'classes/validator.php';

session_start();

if(isset($_POST['submit'])){

    $validator = new validator();

    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    if ($validator->passwordConnect($login, $password) == 0) {

        $error = "Vérifiez votre login ou votre mot de passe.";

    } else {

        $user = new user();
        $user->connect($login);

        $_SESSION['user'] = $user;

        //header("Location: profil.php");
    }

}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form method="post" action="connexion.php">
    <label for="login">Login</label><br>
    <input type="text" id="login" name="login"><br> <br>
         
    <label for="password">Password</label><br>
    <input type="text" id="password" name="password"><br><br>
 
     <input type="submit" value="submit">
</form>


</body>
</html>