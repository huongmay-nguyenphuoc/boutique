<?php

require_once 'classes/user.php';
require_once 'classes/validator.php';
session_start();


if (isset($_POST['formconnexion'])) {

    $validator = new validator();
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    if ($validator->passwordConnect($login, $password) == 0) {
        $error = "Vérifiez votre login ou votre mot de passe.";
    } else {
        $user = new user();
        $user->connect($login);
        $_SESSION['user'] = $user;
        header("Location: profil.php");
       
    }

}

?>


        <!--Alerte (erreur ou succès)-->
        <?php if (isset($error)): ?>
            <div>
                <p class="red-text"><?php echo $error; ?></p>
            </div>
        <?php elseif (isset($success)): ?>
            <div>
                <p class="red-text"><?php echo $success; ?></p>
            </div>
        <?php endif; ?>



<form method="post" action="connexion.php">
    <label for="login">Login</label><br>
    <input type="text" id="login" name="login"><br> <br>
         
    <label for="password">Password</label><br>
    <input type="text" id="password" name="password"><br><br>
 
     <input type="submit" value="submit">
</form>