<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" media="screen" href="../style/boutique.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/header.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/footer.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/panier.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/user.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../style/ficheproduit.css">
    <title> <?= $title ?> - Gamebusters</title>
</head>
<body class="<?= $bodyname ?>">
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
                <article>
                    <ul>
                        <li><a href="../index.php"><span> < </span>Title Screen<span> > </span></a></li>
                        <li><a href="../pages/souscategorie.php?cat=nintendo"><span> < </span>Nintendo
                                Island<span> > </span></a></li>
                        <li><a href="../pages/souscategorie.php?cat=playstation"><span> < </span>Playstation
                                Island<span> > </span></a></li>
                        <li><a href="../pages/souscategorie.php?cat=xbox"><span> < </span>Xbox
                                Island<span> > </span></a></li>
                        <li><a href="../pages/newproducts.php"><span> < </span>New Products<span> > </span></a></li>
                    </ul>
                </article>
            </div>
        </div>
        <div class="navDiv">
            <a class="picNav" href="profil.php"><img class="imgheader" src="../photo/style/iconehead.png"></a>
            <a class="picNav" href="shopcart.php"><img class="imgheader" src="../photo/style/chest.png"></a>
            <a class="picNav" href="search.php"><img class="imgheader" src="../photo/style/loupe.png"></a>
        </div>
    </nav>

</header>