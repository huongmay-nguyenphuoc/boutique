<?php
require_once('database.php');

class shop
{
    private $pdo;

    function __construct()
    {
        $this->pdo = new database();
    }

    function productExists($id)
    {
        $product = $this->pdo->Select('SELECT id_product FROM products WHERE id_product ="' . $id . '"');
        if (!empty($product)) {
            return $product;
        } else {
            return false;
        }
    }


    function selectProduct($id)
    {
        $product = $this->pdo->Select('SELECT * FROM products WHERE id_product ="' . $id . '"');
        return $product;
    }

    function selectProducts($cat, $subcat)
    {
        $products = $this->pdo->Select('SELECT * FROM products WHERE category ="' . $cat . '" AND subcategory ="' . $subcat . '"');
        return $products;
    }
}

//$shop = new shop;
//var_dump($shop->selectProducts("nintendo", "games"));
