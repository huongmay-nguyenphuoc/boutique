<?php
require_once('../classes/cart.php');
$cart = new cart();
$shop = new shop();
$price = $cart->calculatePrice();
if (isset($_POST['removeAll'])) {
    $alert = "Are you sure?";
}
if (isset($_POST['confirmremoveAll'])) {
    $cart->deleteCart();
}

if (isset($_POST['removeOne'])) {
    $cart->deleteProduct($_POST['position']);
    $price = $cart->calculatePrice();
}

if (isset($_POST['verifyCart'])) {
    for ($i = 0; $i < count($_SESSION['panier']); $i++) {

        $verif = $cart->verifyStock($i, $_SESSION['panier'][$i]['idproduct'], $_SESSION['panier'][$i]['quantity']);


        if ($verif == 'adjustQuantity') {
            $message[] = 'Quantity of ' . $_SESSION['panier'][$i]['title'] . ' have been adjusted to fit stock';
        } elseif ($verif == 'deleteProduct') {
            $message[] = 'Product ' . $_SESSION['panier'][$i]['title'] . ' have been removed because it was out of stock';
        }

        if (!isset($message)) {
            $success = 'Everything is okay';
        }
        $price = $cart->calculatePrice();
    }
}

var_dump($_SESSION['panier']);
?>


<?php if (isset($_SESSION['panier']) and !empty($_SESSION['panier'])) : ?>

    <?php foreach ($_SESSION['panier'] as $article) : ?>
        <div>
            <?php $i = 0; ?>
            <?= $article['title'] ?>
            <p>Price :<?= $article['price'] ?></p>
            <p>Quantity :</p><?= $article['quantity'] ?></p>
            <form method="post" action="cart.php">
                <input type="hidden" name="position" value="<?= $i ?>">
                <input type="submit" name="removeOne" value="Delete">
            </form>
        </div>
        <?php $i++; ?>
    <?php endforeach; ?>

    <?= $price ?>

    <form method="post" action="cart.php">
        <input type="submit" name="removeAll" value="Empty Cart">
    </form>

    <?php if (isset($alert)) : ?>
        <div>
            <?= $alert ?>
            <form method="post" action="cart.php">
                <input type="submit" name="confirmremoveAll" value="Yes">
            </form>
        </div>
    <?php endif; ?>

    <?php if (isset($message)) : ?>
        <div>
            <?php foreach ($message as $mess) {
                echo $mess;
            }
            ?>
        </div>
    <?php endif; ?>



    <div>
        <form method="post" action="cart.php">
            <input type="submit" name="verifyCart" value="Verify">
        </form>
    </div>

    <?php if (isset($success)) : ?>
        <?= $success ?>
        <div>
            <form method="post" action="payment.php">
                <input type="submit" name="pay" value="Pay">
            </form>
        </div>
    <?php endif; ?>

<?php else : ?>
    <p>Nothing here.</p>
<?php endif; ?>
