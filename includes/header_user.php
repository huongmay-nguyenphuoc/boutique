<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/user.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/header.css">
    <title>Gamebusters - <?= $title ?></title>
</head>
<body>
<header>
    <nav>
        <div class="navDiv" id="hearts">
        </div>
        <div class="navDiv" id="navClosed">
            <p><b>~~~MENU~~~</b></p>
            <div id="navExpand">
                <article>
                    <h1>Ghostbusters</h1>
                </article>
                <ul>
                    <!-- Utilisateur déconnecté -->
                    <li class="navlink <?php if (!isset($_SESSION['user'])) { echo 'disabled'; } ?>"><a href="../index.php"><span> < </span>Index<span> > </span></a></li>
                    <?php if (!isset($_SESSION['user'])) : ?>
                    <li><a href="../pages/inscription.php"><span> < </span>New user<span> > </span></a></li>
                    <li><a href="../pages/connexion.php"><span> < </span>Log in<span> > </span></a></li>
                        <!-- Utilisateur connecté-->
                    <?php else : ?>
                    <li><a href="../pages/profil.php"><span> < </span>Profile<span> > </span></a></li>
                    <li><a href="../pages/update.php"><span> < </span>Update Profile<span> > </span></a></li>
                    <li><a href="../pages/deconnexion.php"><span> < </span>Log out<span> > </span></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="navDiv" >
            <a href="profil.php">Account</a>
            <a href="shopcart.php">Cart</a>
            <a href="search.php">Search</a>
        </div>
    </nav>

</header>
