<?php
require_once('../classes/user.php');
require_once('../classes/cart.php');
require_once('../classes/order.php');

$cart = new cart();
$shop = new shop();
$title = 'cart';
$bodyname = 'bodyCart';

/*Traitement vider le panier*/
if (isset($_POST['removeAll'])) {
    $alert = "Are you sure?";
}
if (isset($_POST['confirmremoveAll'])) {
    $cart->deleteCart();
}
//var_dump($_POST);
/*Traitement enlever un article*/
if (isset($_POST['removeOne'])) {
    $cart->deleteProduct($_POST['position']);
}

/*Traitement verif stock*/
if (isset($_POST['verifyCart'])) {
    for ($i = 0; $i < count($_SESSION['panier']); $i++) {
        $verif = $cart->verifyStock($i, $_SESSION['panier'][$i]->getId(), $_SESSION['panier'][$i]->getQuantity());
        if ($verif == 'adjustQuantity') {
            $message[] = 'Quantity of ' . $_SESSION['panier'][$i]->getTitle() . ' have been adjusted to fit stock';
        } elseif ($verif == 'deleteProduct') {
            $message[] = 'Product ' . $_SESSION['panier'][$i]->getTitle() . ' have been removed because it was out of stock';
        }
        if (!isset($message)) {
            $success = 'Everything is okay';
        }
    }
}

if (isset($_POST['pay'])) {
    /*REMPLACER PAR SESSION ID*/
    if (!isset($_SESSION['user'])) {
        header('location: connexion.php');
    } else {
        $_SESSION['order'] = new order($_SESSION['user']->getId(), $cart->getTotal(), date('Y-m-d'));

        if (isset($_POST['fee'])) {
            $_SESSION['price'] = $cart->getTotal();
            $_SESSION['price'] = $_SESSION['price'] + 3;
        } else {
            $_SESSION['price'] = $cart->getTotal();
        }
        header('location:payment.php');
    }
}
?>
<?php require_once('../includes/header.php'); ?>

<main class="mainCart">

    <section>
        <h1><em>Basket</em></h1><br>
        <table>
            <caption>
                <?php if (isset($_SESSION['panier']) and !empty($_SESSION['panier'])) : ?>
                    <?= count($_SESSION['panier']) ?>
                <?php else : ?>
                    0
                <?php endif; ?>
                /10
            </caption>
            <tr>
                <?php $i = 0; ?>
                <?php while ($i <= 9) : ?>

                    <?php if (isset($_SESSION['panier']) and !empty($_SESSION['panier']) and ($i < count($_SESSION['panier']))): ?>
                        <?php foreach ($_SESSION['panier'] as $article) : ?>
                            <td class="hovertd">
                                <p>x<?= $article->getQuantity() ?></p>
                                <div class="container">
                                    <img src="../productPics/<?= $article->getPicture() ?>">
                                </div>

                                <div class="blocinfo">
                                    <div>
                                        <a class="linkHidden"
                                           href="fiche_produit.php?id=<?= $article->getId() ?>"><?= $article->getTitle() ?> </a><br>
                                        <?= $article->getPrice() ?><img class="diamond" height="15px"
                                                                        src="../photo/style/diamond.png">
                                    </div>
                                    <form method="post" action="shopcart.php">
                                        <input type="hidden" name="position" value="<?= $i ?>">
                                        <input type="submit" name="removeOne" value="Remove">
                                    </form>
                                </div>
                                <?php $i++; ?>

                            </td>
                        <?php endforeach; ?>

                    <?php else : ?>
                        <td class="emptyTd"></td>
                        <?php $i++; ?>
                    <?php endif; ?>
                    <?php if ($i == 5) {
                        echo '</tr><tr>';
                    } ?>
                <?php endwhile; ?>

            </tr>

        </table>
    </section>
    <section>

        <?php if (isset($_SESSION['panier']) and !(empty($_SESSION['panier']))): ?>
            <div>
            <span>Total: <?= $cart->getTotal() ?> <img class="diamond" height="15px"
                                                       src="../photo/style/diamond.png"></span>
                <?php if ($cart->getTotal() < 100) : ?>
                    <span>| Shipping fees: 3 <img class="diamond" height="15px"
                                                  src="../photo/style/diamond.png"></span>
                    <?php $fee = true; ?>
                <?php else : ?>
                    <span>| Shipping fees: on the house</span>
                <?php endif; ?>
            </div>

            <!--Affichage boutons vider panier-->
            <div>
                <?php if (!isset($success) and (!isset($alert))) : ?>

                    <form method="post" action="shopcart.php">
                        <div>
                            <span>< </span>
                            <input type="submit" name="removeAll" value="Empty Cart">
                            <span> ></span>
                        </div>
                    </form>

                    <form method="post" action="shopcart.php">
                        <div>
                            <span>< </span>
                            <input type="submit" name="verifyCart" value="Verify Stock">
                            <span> ></span>
                        </div>
                    </form>

                <?php endif; ?>
            </div>


            <?php if (isset($message)) : ?>
                <div>
                    <?php foreach ($message as $mess) : ?>
                        <?= $mess ?>
                    <?php endforeach; ?>
                </div>

            <?php elseif (isset($success)) : ?>
                <div>
                    <p><small>  <?= $success ?></small></p>
                    <form method="post" action="shopcart.php">
                        <?php if (isset($fee) and $fee == true) : ?>
                            <input type="hidden" name="fee" value="3">
                        <?php endif; ?>
                        <div>
                            <span>< </span>
                            <input type="submit" name="pay" value="I will pay!">
                            <span> ></span>
                        </div>
                    </form>

                    <a class="linkNo" href="shopcart.php"><span>< </span>I'd rather not...<span> ></span></a>

                    </form>
                </div>


            <?php elseif (isset($alert)) : ?>
                <div>
                    <p><small><?= $alert ?></small></p>
                    <span><form method="post" action="shopcart.php">
                            <div>
                        <span>< </span>
                        <input type="submit" name="confirmremoveAll" value="Yes">
                             <span> ></span>
                </div>
                    </form> <a class="linkNo" href="shopcart.php"><span>< </span>No<span> ></span></a></span>
                </div>
            <?php endif; ?>


        <?php else: ?>
            <p> Nothing here ...</p>
        <?php endif; ?>

    </section>


</main>

