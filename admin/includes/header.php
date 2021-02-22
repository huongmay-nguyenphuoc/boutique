<html>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title><?php if (isset ($titre)) {echo $titre;} ?> -GameBusters</title>
</head>

<body>
<header>
    <nav>
        <div class="nav-wrapper blue">
            <a href="../pages/categorie.php" class="brand-logo">GameBusters<i class="material-icons right">videogame_asset</i></a>
            <a href="#" class="sidenav-trigger" data-target="mobile-links"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li class="navlink"><a href="./gestion_membres.php">All members</a></li>
                <li class="navlink"><a href="./produits.php">All products</a></li>
                <li class="navlink"><a href="./gestion_commande.php">All orders</a></li>
                <li class="navlink"><a href="../pages/categorie.php">Shop Access</a></li>
                <!-- Utilisateur déconnecté -->

                <?php if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() !=1) : ?>
                    <li><a href="../pages/inscription.php" class="btn white indigo-text">Create user</a></li>
                    <li><a href="../pages/connexion.php" class="btn white indigo-text">Log in</a></li>
                    <!-- Utilisateur connecté-->
                <?php else : ?>
                    <li><a href="./admin_profil.php" class="btn white indigo-text">Admin Profile</a></li>
                    <li><a href="../pages/deconnexion.php" class="btn white indigo-text">Log out</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-links">
        <li><a href="./gestion_membres.php">All members<i class="material-icons">brightness_3</i></a></li>
        <li><a href="./produits.php">All products<i class="material-icons">brightness_2</i></a></li>
        <li><a href="./gestion_commande.php">All orders<i class="material-icons">brightness_1</i></a></li>

        <li class="navlink"><a href="../pages/categorie.php">Shop Access<i class="material-icons">brightness_4</i></a></li>
        <!-- Utilisateur déconnecté -->

        <?php if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() !=1) : ?>
            <li><a href="../pages/inscription.php" class="btn white indigo-text">Create new user</a></li>
            <li><a href="../pages/connexion.php" class="btn white indigo-text">Log in<a></li>
            <!-- Utilisateur connecté-->
        <?php else : ?>
            <li><a href="./admin_profil.php" class="btn white indigo-text">Admin Profile</a></li>
            <li><a href="../pages/deconnexion.php" class="btn white indigo-text">Log out</a></li>
        <?php endif; ?>
    </ul>
</header>