<?php

require_once '../classes/user.php';
require_once '../classes/validator.php';

session_start();
if (isset($_SESSION['user'])) {
    header("Location: profil.php");
}

if (isset($_POST['submit'])) {

    $validator = new validator();

    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    if ($validator->passwordConnect($login, $password) == 0) {
        $error = "False login or password";
    } else {
        $user = new user();
        $user->connect($login);

        $_SESSION['user'] = $user;

        if($_SESSION['user']->getLogin()== 'admin')
        {
            header("Location: ../admin/profil_admin.php?id=".$_SESSION['user']->getId());
        }

        elseif ($_SESSION['user']->getLogin()!= 'admin')
        {
            header("Location: profil.php?id=".$_SESSION['user']->getId());
        }

//

    }

}

?>


<html lang="en">

<main>
        <h3><em>Connexion</em></h3>

        <!--Alerte (erreur ou succès)-->
        <?php if (isset($error)): ?>
            <div>
                <p><?= $error?></p>
            </div>
        <?php endif; ?>


        <form method="post" action="connexion.php">
            <label for="login">Login</label><br>
            <input type="text" id="login" name="login"><br><br>

            <label for="password">Password</label><br>
            <input type="password" id="password" name="password"><br><br>

            <button class="btn waves-effect waves-light black " type="submit" name="submit">
               LOGIN
            </button>
        </form>

</main>
</html>