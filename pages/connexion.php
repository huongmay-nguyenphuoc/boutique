<?php

require_once '../classes/user.php';
require_once '../classes/validator.php';
session_start();


if (isset($_POST['submit'])) {

    $validator = new validator();

    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    if ($validator->passwordConnect($login, $password) == 0) {
        
        $error = "False Login or password";

    } else {

        $user = new user();
        $user->connect($login);
        
        $_SESSION['user'] = $user;
        header("Location: profil.php");
       
    }

}

?>


<html lang="en">


<main class="valign-wrapper">
    <div class="row">
        <h3 class="center"><em>Connexion</em></h3>

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
 
    <button class="btn waves-effect waves-light black " type="submit" name="submit">
                <i class="material-icons right">send</i>
            </button>
</form>

</main>
</html>