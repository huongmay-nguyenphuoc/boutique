<?php

require_once '../classes/user.php';
require_once '../classes/validator.php';


$title = "Log in";
$bodyname = "bodyuser";

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

        if($_SESSION['user']->getStatus()== 1)
        {
            header("Location: ../admin/profil_admin.php");
        }

        elseif ($_SESSION['user']->getStatus()!= 1)
        {
            header("Location: profil.php");
        }

//

    }

}

?>


<?php include '../includes/header_user.php'; ?>


<h1><em><b>Log in</b></em></h1>
        <!--Alerte (erreur ou succès)-->
        <?php if (isset($error)): ?>
            <div>
                <p><?= $error?></p>
            </div>
        <?php endif; ?>

<main>
        <form method="post" action="connexion.php" class="formlogin">
            <fieldset>
                <legend><em><b>Log in</b></em></legend><br>

                <div>
                    <label for="login">Login</label><br>
                    <input type="text" id="login" name="login"><br><br>
                </div>

                <div>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password"><br><br>
                </div>


            <button class="btn waves-effect waves-light black " type="submit" name="submit">
               LOGIN
            </button>
            </fieldset>
        </form>


    <a href="inscription.php"><button>No Account yet, register now !</button> </a>
</main>


<?php include '../includes/footer.php'; ?>