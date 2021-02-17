<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title><?php if (isset ($titre)) {echo $titre;} ?> - GameBusters</title>
</head>

<body>
<header>
    <nav>
        <div class="nav-wrapper black">
            <a href="../profil_admin.php" class="brand-logo">GameBusters<i class="material-icons right">flare</i></a>
            <a href="#" class="sidenav-trigger" data-target="mobile-links"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                <li class="navlink"><a href="../gestion_membres.php">Gestion des membres</a></li>
                <li class="navlink"><a href="../produits.php">Gestion des produits</a></li>
                <li class="navlink"><a href="../gestion_commande.php">Gestion des commandes</a></li>
                <li class="navlink"><a href="../pages/boutique.php">Accès à la boutique</a></li>

                <!-- Utilisateur déconnecté -->
                <li class="navlink <?php if ($_SESSION['user'] == 0) { echo 'disabled'; } ?>"><a href="../pages/boutique.php">Accès à la boutique</a></li>
                <?php if (!isset($_SESSION['user'])) : ?>
                    <li><a href="../pages/inscription.php" class="btn white indigo-text">Inscription</a></li>
                    <li><a href="../pages/connexion.php" class="btn white indigo-text">Connexion</a></li>
                    <!-- Utilisateur connecté-->
                <?php else : ?>
                    <li><a href="profil_admin.php" class="btn white indigo-text">Profil</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-links">
        <li><a href="../index.php">Home<i class="material-icons">brightness_3</i></a></li>
        <li><a href="../index.php">About<i class="material-icons">brightness_2</i></a></li>
        <li><a href="../index.php">Contact<i class="material-icons">brightness_1</i></a></li>
        <li class="navlink"><a href="walloffame.php">Wall of Fame<i class="material-icons">brightness_4</i></a></li>
        <!-- Utilisateur déconnecté -->
        <li class="navlink <?php if (!isset($_SESSION['user'])) {
            echo 'disabled';
        } ?>"><a href="level.php">Tirer les cartes<i class="material-icons">brightness_5</i></a></li>
        <?php if (!isset($_SESSION['user'])) : ?>
            <li><a href="inscription.php" class="btn white indigo-text">Inscription</a></li>
            <li><a href="connexion.php" class="btn white indigo-text">Connexion</a></li>
            <!-- Utilisateur connecté-->
        <?php else : ?>
            <li><a href="profil.php" class="btn white indigo-text">Profil</a></li>
            <li><a href="deconnexion.php" class="btn white indigo-text">Déconnexion</a></li>
        <?php endif; ?>
    </ul>
</header>