<?php
require_once('../classes/shop.php');
require_once('../classes/cart.php');

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
        $cart->addQuantity($_POST['id_product'], $_POST['quantity']);
    }
    if ($_SESSION['alarm'] == 0 or empty($_SESSION['panier']) or !isset($_SESSION['panier'])) {
        $cart->addArticle($_POST['id_product'], $_POST['quantity']);
    }
    header("location:fiche_produit.php?id=$id");
}

?>

<?php if (isset($error)) : ?>
    <div>
        <p><?= $error ?></p>
        <a href="categorie.php">Back</a>
    </div>

<?php else : ?>
    <h3><?= $product->getTitle() ?></h3>
    <p>Price : <?= $product->getPrice() ?></p>

    <!--Si en stock-->
    <?php if ($product->getStock() > 0): ?>
        <!--Si stock temporaire-->
        <?php if ($tempStock >= 1) : ?>
            <form method="post" action="fiche_produit.php">
                <input type='hidden' name='id_product' value='<?= $product->getId() ?>'>
                <select id="quantity" name="quantity">
                    <?php for ($i = 1; $i <= $tempStock && $i <= 5; $i++) : ?>
                        <option><?= $i ?></option>
                    <?php endfor; ?>
                </select>
                <input type="submit" name="addBasket" value="add">
            </form>
        <?php else : ?>
            <p>Lucky you, you took the last ones!</p>
        <?php endif; ?>
    <?php else : ?>
        <p>Out of stock...</p>
    <?php endif; ?>

    <a href="boutique.php?cat=<?= $product->getCat() ?>&subcat=<?= $product->getSubcat() ?>">Back</a>
<?php endif; ?>