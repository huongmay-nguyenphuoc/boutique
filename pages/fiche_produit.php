<?php
require_once('../classes/shop.php');
require_once('../classes/cart.php');
$title = 'fiche produit';
$bodyname = 'bodyFicheProd';
//var_dump($_SESSION);
//var_dump($_POST);
/*Gestion erreurs des infos dans l'URL*/
if (!empty($_GET['id']) and is_numeric($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);

    /*Récupère info du produit*/
    $shop = new shop;
    if ($shop->productExists($id)) {
        $product = $shop->selectProduct($id, 0);
        $tempStock = $product->getStock();

        /*Crée un stock temporaire pour éviter de revenir sur la page et ajouter des quantités > au stock */
        if (isset($_SESSION['panier']) and !empty($_SESSION['panier'])) {
            for ($i = 0; $i < count($_SESSION['panier']); $i++) {
                if ($_SESSION['panier'][$i]->getId() == $id) {
                    $tempStock = $product->getStock() - $_SESSION['panier'][$i]->getQuantity();
                }
            }
        }
    } else {
        $error = 'Nothing matches.';
    }
} else {
    header('location:404.php');
}

/*Traitement ajout produit*/
if (isset($_POST['addBasket'])) {
    $cart = new cart;
    $_SESSION['alarm'] = 0;
    $id = $_POST['id_product'];

    if (isset($_SESSION['panier']) and !empty($_SESSION['panier'])) {
        if (count($_SESSION['panier']) >= 10) {
            $_SESSION['toomuch'] = true;
        } else {
            $cart->addQuantity($_POST['id_product'], $_POST['quantity']);

            $_SESSION['added'] = $_POST['quantity'];
        }
    }
    if ($_SESSION['alarm'] == 0 or empty($_SESSION['panier']) or !isset($_SESSION['panier'])) {
        $cart->addArticle($_POST['id_product'], $_POST['quantity']);

        $_SESSION['added'] = $_POST['quantity'];
    }
    header("location:fiche_produit.php?id=$id");
}

?>
<?php require_once('../includes/header.php'); ?>
<main>

    <?php if (isset($error)) : ?>
        <div>
            <p><?= $error ?></p>
            <a href="categorie.php">Back to the shop</a>
        </div>

    <?php else : ?>


        <section>
            <article>
                <div class="imgcontainer">
                    <img class="productPic" height="300px" src="../productPics/<?= $product->getPicture() ?>">
                </div>
            </article>

            <article class="productInfo">
                <div class="titleInfo">
                    <h2><?= $product->getTitle() ?></h2>
                    <p><?= $product->getDescription() ?></p>
                </div>
                <div>
                    <div class="divStock">
                        <!--Si en stock-->
                        <?php if ($product->getStock() > 0): ?>
                            <!--Si stock temporaire-->
                            <?php if ($tempStock >= 1) : ?>
                                <form method="post" action="fiche_produit.php">
                                    <input type='hidden' name='id_product' value='<?= $product->getId() ?>'>
                                    <div>
                                        <label for="quantity">How many?</label>
                                        <select id="quantity" name="quantity" required>
                                            <?php for ($i = 1; $i <= $tempStock && $i <= 5; $i++) : ?>
                                                <option><?= $i ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="addBasket">Add to basket</label>
                                        <input type="submit" name="addBasket" class="addBasket" value="">
                                    </div>

                                </form>

                            <?php else : ?>
                                <p>Lucky you, you took the last ones!</p>
                            <?php endif; ?>

                        <?php else : ?>
                            <p>Out of stock...</p>
                        <?php endif; ?>

                    </div>
                    <div class="divPrice">

                        <p class="price"><?= $product->getPrice() ?><img height="50px"
                                                                         src="../photo/style/diamond.png"</p>
                    </div>
                </div>
            </article>
        </section>

        <section id="ShoptextBox">
            <?php if (isset($_SESSION['toomuch']) and ($_SESSION['toomuch']) == true) :?>
            <p><small>Sorry, your basket is full!</small></p>
                <a href="shopcart.php">Open basket</a>
                <?php $_SESSION['toomuch'] = false; ?>
            <?php elseif (isset($_SESSION['added']) and $_SESSION['added'] != false) : ?>
                <p><small><?= $_SESSION['added'] ?> Item(s) added to
                        the basket!</small></p><br>
                <a href="boutique.php?cat=<?= $product->getCat() ?>&subcat=<?= $product->getSubcat() ?>">Continue
                    shopping</a>
                <a href="shopcart.php">Open basket</a>
                <?php $_SESSION['added'] = false; ?>
            <?php else: ?>
                <a href="boutique.php?cat=<?= $product->getCat() ?>&subcat=<?= $product->getSubcat() ?>">Continue shopping</a>
            <?php endif; ?>
        </section>

    <?php endif; ?>

</main>
