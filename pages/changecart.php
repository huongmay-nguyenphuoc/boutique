<?php
require_once('../classes/cart.php');
$cart = new cart;

if (isset($_POST['addBasket'])) {
    $_SESSION['alarm'] = 0;
    $id = $_POST['id_product'];

    if (isset($_SESSION['panier']) and !empty($_SESSION['panier'])) {
        $cart->addQuantity($_POST['id_product']);
    }
    if ($_SESSION['alarm'] == 0 or empty($_SESSION['panier']) or !isset($_SESSION['panier'])) {
        $cart->addArticle($_POST['id_product']);
    }
    header("location:fiche_produit.php?id=$id");
}
