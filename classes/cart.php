<?php
require_once('database.php');
require_once('shop.php');
require_once('product.php');
session_start();

class cart
{
    private $totalPrice;
    private $shop;

    function __construct()
    {
        $this->totalPrice = 0;
        $this->shop = new shop;
    }

    /*CALCULE MONTANT TOTAL PANIER*/
    function getTotal()
    {
        $total = 0;
        for ($i = 0; $i < count($_SESSION['panier']); $i++) {
            $total += $_SESSION['panier'][$i]->getQuantity() * $_SESSION['panier'][$i]->getPrice();
        }
        $this->totalPrice = round($total, 2);
        return $this->totalPrice;
    }

    /*SUPPRIME UN ARTICLE DU PANIER*/
    function deleteProduct($position)
    {
        $_SESSION['panier'][$position]->deleteQ();
        array_splice($_SESSION['panier'], $position, 1);
        $this->getTotal();
    }

    /*AJOUTE QUANTITE SI UN ARTICLE DEJA PRESENT DANS LE PANIER */
    function addQuantity($id, $quantity)
    {
        $data = $this->shop->selectProduct($_POST['id_product'], $quantity);

        if (isset($_SESSION['panier']) and !empty($_SESSION['panier'])) {
            for ($i = 0; $i < count($_SESSION['panier']); $i++) {
                if ($_SESSION['panier'][$i]->getId() == $_POST['id_product']) {
                    $_SESSION['panier'][$i]->addQ($quantity);
                    $_SESSION['alarm'] = 1;
                }
            }
        }
    }

    /*AJOUTE UN NOUVEL ARTICLE DANS LE PANIER*/
    function addArticle($id, $quantity)
    {
        $data = $this->shop->selectProduct($_POST['id_product'], $quantity);
        $_SESSION['alarm'] = 0;
        $_SESSION['panier'][] = $data;
    }

    /*VIDE LE PANIER*/
    function deleteCart()
    {
        unset($_SESSION['panier']);
    }

    /*COMPARE LES QUANTITES DEMANDEES AU STOCK*/
    function verifyStock($position, $id, $quantity)
    {
        $data = $this->shop->selectProduct($id, $quantity);
        if ($data->getStock() == 0) {
            $this->deleteProduct($position);
            return 'deleteProduct';
        } elseif ($data->getStock() < $quantity) {
            $_SESSION['panier'][$position]->adjustQuantity($data->getStock());
            return 'adjustQuantity';
        }
        $this->getTotal();
    }
}