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
<?php if (!isset($error)): ?>
<main id="mainShop">
    <?php else : ?>
    <main>
        <?php endif; ?>

        <!--Affichage erreur-->
        <?php if (isset($error)): ?>
            <section class="shopTitle shopSection">
                <p><?= $cat ?> Island</p>
                <p>___________________________________<+>___________________________________</p>
                <p><?= $subcat ?> Shop</p>
            </section>
            <section class="shopSection">
                <article class="text-box text-box2 text-box3">
                    <p><?= $error ?></p>
                    <a href="souscategorie.php?cat=<?= $cat ?>">Back</a>
                </article>
            </section>


            <!--Affichage produits-->
        <?php else : ?>
            <section class="bigSectionShop">
                <section class="productList">
                    <ul>
                        <?php $i = 0; ?>
                        <?php foreach ($products as $product) : ?>
                            <li class="eachProduct">
                                <ul>
                                    <li><span><?= $product->getTitle() ?> | <?= $product->getPrice() ?><img
                                                    height="15px"
                                                    src="../photo/style/diamond.png">

                                    <?php if ($product->getStock() <= 0) : ?>
                                        | out of stock
                                    <?php endif; ?>
                                        </span>
                                        <span>
                                        <form method="post">
                                            <input type="hidden" name="value" value="<?= $i ?>">
                                            <input type="submit" name="show" value="Tell me more"></form>
                                            </span>
                                    </li>

                                    <?php if (isset($show[$i])) : ?>
                                        <?php $shortdesc = $product->getShortdesc(); ?>
                                        <?php $id = $product->getId(); ?>
                                        <?php if ($product->getStock() <= 0) {
                                            $out = true;
                                        } ?>
                                    <?php endif; ?>
                                </ul>
                                <?php $i++; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </section>

                <section class="shopKeeper">
                    <?php if (!isset($shortdesc)) : ?>
                        <p class="bubble">Hello! How can I help you?</p>
                    <?php else: ?>
                        <p class="bubble"><?= $shortdesc ?> <br><br>At least, that's what it says ...</p>
                    <?php endif; ?>
                </section>
            </section>

            <section class="smallSectionShop">
                <div>
                    <span class="shopname"><small><em><?= $cat ?> Island, <?= $subcat ?> Shop</em></small></span>
                </div>
                <div>
                    <?php if (isset($shortdesc) and (isset($id))) : ?>
                        <?php if (isset($out) and $out == true) : ?>
                            <a href="fiche_produit.php?id=<?= $id ?>"> < I know it's out of stock, can I still see the
                                sample? > </a>
                            <?php $out = false; ?>
                        <?php else : ?>
                            <a href="fiche_produit.php?id=<?= $id ?>"> < I'm interested, can I see the item? > </a>
                        <?php endif; ?>
                    <?php else : ?>
                        <p>Hi! I'm just looking...</p>
                    <?php endif; ?>
                </div>
            </section>

        <?php endif; ?>
    </main>