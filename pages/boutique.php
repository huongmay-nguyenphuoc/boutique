<?php
require_once('../classes/shop.php');

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
    $error = "Something happened";
}

?>

<p><?= $cat ?></p>
<p><?= $subcat ?></p>

<!--Affichage erreur-->
<?php if (isset($error)): ?>
    <div>
        <p><?= $error ?></p>
        <a href="categorie.php">Back</a>
    </div>

    <!--Affichage produits-->
<?php else : ?>
    <?php foreach ($products as $product) : ?>
        <ul>
            <li>
                <ul>
                    <li><?= $product->getTitle() ?></li>
                    <li><?= $product->getShortdesc() ?></li>
                    <li><a href="fiche_produit.php?id=<?= $product->getId() ?>">More</a></li>
                </ul>
            </li>
        </ul>
    <?php endforeach; ?>
<?php endif; ?>
