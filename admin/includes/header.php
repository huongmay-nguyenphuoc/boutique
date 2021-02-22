<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" href="style/style.css">
    <title><?php if (isset ($titre)) {echo $titre;} ?> - GameBusters</title>
</head>

<body>
<header>
    <nav>
        <div class="nav-wrapper blue">
            <a href="../pages/categorie.php" class="brand-logo">GameBusters<i class="material-icons right">videogame_asset</i></a>
            <a href="#" class="sidenav-trigger" data-target="mobile-links"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li class="navlink"><a href="./gestion_membres.php">Gestion des membres</a></li>
                <li class="navlink"><a href="./produits.php">Gestion des produits</a></li>
                <li class="navlink"><a href="./gestion_commande.php">Gestion des commandes</a></li>
                <li class="navlink"><a href="../pages/categorie.php">Accès à la boutique</a></li>

                <!-- Utilisateur déconnecté -->
                <li class="navlink <?php if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() != 1) { echo 'disabled'; } ?>"><a href=../pages/connexion.php">Log in</a></li>
                <?php if (!isset($_SESSION['user'])) : ?>
                    <!-- Utilisateur connecté-->
                <?php else : ?>
                    <li><a href="profil_admin.php" class="btn white indigo-text">Admin Profile</a></li>
                    <li><a href="deconnexion.php" class="btn white indigo-text">Log out</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-links">
        <li class="navlink"><a href="./gestion_membres.php">Gestion des membres</a></li>
        <li class="navlink"><a href="./produits.php">Gestion des produits</a></li>
        <li class="navlink"><a href="./gestion_commande.php">Gestion des commandes</a></li>
        <li class="navlink"><a href="../pages/boutique.php">Accès à la boutique</a></li>
        <!-- Utilisateur déconnecté -->
        <li class="navlink <?php if (!isset($_SESSION['user'])) {
            echo 'disabled';
        } ?>"><a href="../pages/connexion.php">Log in<i class="material-icons">brightness_5</i></a></li>
        <?php if (!isset($_SESSION['user'])) : ?>
            <!-- Utilisateur connecté-->
        <?php else : ?>
            <li><a href="../pages/profil.php" class="btn white indigo-text">Admin Profile</a></li>
            <li><a href="../pages/deconnexion.php" class="btn white indigo-text">Log out</a></li>
        <?php endif; ?>
    </ul>
</header>
