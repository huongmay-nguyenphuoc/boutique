<?php
require_once('../classes/shop.php');
require_once('../classes/cart.php');
$shop = new shop;
$cart = new cart;

$error = '';
if (!empty($_GET['id']) and is_numeric($_GET['id'])) {

    $id = htmlspecialchars($_GET['id']);
    if ($shop->productExists($id)) {
        $product = $shop->selectProduct($id)[0];
        $tempStock = $product['stock'];

        if (isset($_SESSION['panier']) and !empty($_SESSION['panier'])) {
            for ($i = 0; $i < count($_SESSION['panier']); $i++) {
                if ($_SESSION['panier'][$i]['idproduct'] == $id) {
                    $tempStock = $product['stock'] - $_SESSION['panier'][$i]['quantity'];
                }
            }
        }

    } else {
        $error = 'Nothing matches.';
    }
} else {
    $error = 'Something happened.';
}


?>

<?php if (!empty($error)) : ?>
    <div>
        <p><?= $error ?></p>
        <a href="categorie.php">Back</a>
    </div>

<?php else : ?>
    <h3><?= $product['title'] ?></h3>
    <?= $product['price'] ?>

    <?php if ($product['stock'] > 0): ?>
        <form method="post" action="changecart.php">
            <input type='hidden' name='id_product' value='<?= $product['id_product'] ?>'>

            <?php if ($tempStock >= 1) : ?>
                <select id="quantity" name="quantity">
                    <?php for ($i = 1; $i <= $tempStock && $i <= 5; $i++) : ?>
                        <option><?= $i ?></option>
                    <?php endfor; ?>
                </select>
                <input type="submit" name="addBasket" value="add">
            <?php else : ?>
                <p>Out of stock</p>
            <?php endif; ?>


        </form>

    <?php else : ?>
        <p>Rupture de stock</p>
    <?php endif; ?>

    <a href="boutique.php?cat=<?= $product['category'] ?>&subcat=<?= $product['subcategory'] ?>">Back</a>
<?php endif; ?>