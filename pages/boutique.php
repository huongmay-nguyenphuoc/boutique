<?php
require_once('../classes/shop.php');
$title = 'shop';
$bodyname = 'bodyShop';
/*Gestion erreurs des infos dans l'URL*/
$cats = array('nintendo', 'xbox', 'playstation');
$subcats = array('games', 'consoles', 'secondhand');
if (in_array(($_GET['cat']), $cats) and in_array(($_GET['subcat']), $subcats)) {
    $cat = htmlspecialchars($_GET['cat']);
    $subcat = htmlspecialchars($_GET['subcat']);
} else {
    header('location:404.php');
}

/*Récupère les produits correspondant à la cat et souscat*/
$shop = new shop;
$products = $shop->selectProducts($cat, $subcat);
if (empty($products)) {
    $bodyname = 'bodyClosedShop';
    $error = "Oh ... Seems like the shop is closed! Maybe you should come back later?";
}

/*Traitement bouton description*/
if (isset($_POST['show'])) {
    $show[$_POST["value"]] = true;
}
?>

<?php require_once('../includes/header.php'); ?>
<main>
    <section class="shopTitle shopSection">
        <p><?= $cat ?> Island</p>
        <p>___________________________________<+>___________________________________</p>
        <p><?= $subcat ?> Shop</p>
    </section>

    <!--Affichage erreur-->
    <?php if (isset($error)): ?>
        <section class="shopSection">
            <article class="text-box text-box2 text-box3">
                <p><?= $error ?></p>
                <a href="souscategorie.php?cat=<?= $cat ?>">Back</a>
            </article>
        </section>
        <!--Affichage produits-->
    <?php else : ?>
        <ul>
            <?php $i = 0; ?>
            <?php foreach ($products as $product) : ?>
                <li>
                    <ul>
                        <li><?= $product->getTitle() ?></li>
                        <li>
                            <form method="post">
                                <input type="hidden" name="value" value="<?= $i ?>">
                                <input type="submit" name="show" value="show"></form>
                        </li>
                        <?php if (isset($show[$i])) : ?>
                            <li><?= $product->getShortdesc() ?></li>
                        <?php endif; ?>
                        <li><a href="fiche_produit.php?id=<?= $product->getId() ?>">More</a></li>
                    </ul>
                    <?php $i++; ?>
                </li>

            <?php endforeach; ?>
        </ul>

    <?php endif; ?>

</main>