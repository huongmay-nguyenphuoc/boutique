<?php
require_once('database.php');
require_once('../classes/shop.php');
session_start();

class cart
{
    function calculatePrice()
    {
        $total = 0;
        for ($i = 0; $i < count($_SESSION['panier']); $i++) {
            $total += $_SESSION['panier'][$i]['quantity'] * $_SESSION['panier'][$i]['price'];
        }
        return round($total, 2);
    }

    function deleteProduct($position)
    {
        unset($_SESSION['panier'][$position]['quantity']);
        array_splice($_SESSION['panier'], $position, 1);
    }


    function addQuantity($id)
    {
        $shop = new shop();
        $data = $shop->selectProduct($_POST['id_product'])[0];

        if (isset($_SESSION['panier']) and !empty($_SESSION['panier'])) {
            for ($i = 0; $i < count($_SESSION['panier']); $i++) {
                if ($_SESSION['panier'][$i]['idproduct'] == $_POST['id_product']) {
                    $_SESSION['panier'][$i]['quantity']++;
                    $_SESSION['alarm'] = 1;
                }
            }
        }
    }

    function addArticle($id)
    {
        $shop = new shop();
        $data = $shop->selectProduct($_POST['id_product'])[0];
        $_SESSION['alarm'] = 0;
        $_SESSION['panier'][] = array(
            "idproduct" => (int)$_POST['id_product'],
            "quantity" => (int)$_POST['quantity'],
            "title" => $data['title'],
            "price" => $data['price'],
            "picture" => $data['picture']
        );
    }

    function deleteCart()
    {
        unset($_SESSION['panier']);
    }


    function verifyStock($position, $id, $quantity)
    {
        $shop = new shop();
        $data = $shop->selectProduct($id)[0];

        if ($data['stock'] == 0) {
            $this->deleteProduct($position);
            $return = 'deleteProduct';
            return $return;
        } elseif ($data['stock'] < $quantity) {
            $_SESSION['panier'][$position]['quantity'] = $data['stock'];
            $return = 'adjustQuantity';
            return $return;
        }
    }
}