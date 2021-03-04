<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="style/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/header.css">
    <title><?= $title ?> - Gamebusters</title>
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
                    <h1>Gamebusters</h1>
                </article>
                <article>
                <ul>
                        <li><a href="./profil_admin.php"><span> < </span>Index<span> > </span></a></li>
                        <li><a href="./gestion_membres.php"><span> < </span> All members<span> > </span></a></li>
                        <li><a href="./gestion_category.php"><span> < </span> All categories<span> > </span></a></li>
                        <li><a href="./gestion_subcategory.php"><span> < </span> All subcategories<span> > </span></a></li>
                        <li><a href="./produits.php"><span> < </span>All products<span> > </span></a></li>
                        <li><a href="./gestion_commande.php"><span> < </span>All orders<span> > </span></a></li>
                        <li><a href="./mail.php"><span> < </span>All inbox messages<span> > </span></a></li>
                        <li><a href="../pages/deconnexion.php"><span> < </span>Log out<span> > </span></a></li>

                </ul>
                </article>
            </div>
        </div>
        <div class="navDiv" >
            <a href="../pages/update.php">Update Account</a>
            <span> | </span>
            <a href="../pages/categorie.php">Shop Access</a>
        </div>
    </nav>

</header>
