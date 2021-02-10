<?php

require_once '../classes/user.php';

session_start();

if (!isset($_SESSION['user'])) {

    header('location: connexion.php');
}

var_dump($_SESSION['user']);
?>


<html lang="en">

<main class="center mainSpace">

        <article class="container">
            <h3><em>Profil @<?php echo $_SESSION['user']->getLogin(); ?></em></h3>
            <a class="waves-effect waves-light white black-text btn-small" href="update.php">Modifier vos
                identifiants</a>
        </article>


</main>

</html>