<?php
require_once('database.php');
require_once('cart.php');

class order
{

    private $id_member;
    private $totalPrice;
    private $date;
    private $state;
    private $pdo;
    private $id_order;

    function __construct($id, $price, $date)
    {
        $this->pdo = new database();
        $this->id_member = $id;
        $this->date = $date;
        $this->totalPrice = $price;
    }

    function insertOrder()
    {
        $this->pdo = new database();
        $this->pdo->Insert('Insert into `order` (id_member, amount, date_register) values ( :id, :amount, :date)',
            ['id' => $this->id_member,
                'amount' => $this->totalPrice,
                'date' => $this->date,
            ]);

        $this->id_order = $this->pdo->getLastId();

        for ($i = 0; $i < count($_SESSION['panier']); $i++) {
            $this->pdo->Insert('Insert into `order_details` (title, id_order, quantity, price) values ( :title, :product, :quantity, :price)',
                ['id' => $this->id_order,
                    'product' => $_SESSION['panier'][$i]->getTitle(),
                    'quantity' => $_SESSION['panier'][$i]->getQuantity(),
                    'price' => $_SESSION['panier'][$i]->getPrice()
                ]);
        }
    }

    function changeStock()
    {
        $this->pdo = new database();
        for ($i = 0; $i < count($_SESSION['panier']); $i++) {
            $this->pdo->Update('Update `products` SET stock = stock - :newstock WHERE id_product = :id',
                [
                    'newstock' => $_SESSION['panier'][$i]->getQuantity(),
                    'id' => $_SESSION['panier'][$i]->getId()
                ]);
        }
        return true;
    }

    function deleteCart()
    {
        $cart = new cart();
        $cart->deleteCart();
        unset($_SESSION['order']);
        unset($_SESSION['price']);
    }
}
