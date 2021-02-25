<?php
require_once('database.php');
require_once('product.php');

class shop
{
    private $pdo;

    function __construct()
    {
        $this->pdo = new database();
    }

    /*VERIFIE EXISTENCE PRODUIT*/
    function productExists($id)
    {
        $product = $this->pdo->Select('SELECT id_product FROM products WHERE id_product ="' . $id . '"');
        if (!empty($product)) {
            return $product;
        } else {
            return false;
        }
    }

    /*RECUPERE INFOS D'UN PRODUIT ET CREE UNE INSTANCE PRODUIT*/
    function selectProduct($id, $quantity)
    {
        $data = $this->pdo->Select('SELECT * FROM products WHERE id_product ="' . $id . '"');
        $data = $data[0];
        $product = new product($data['id_product'], $data['price'], $data['stock'], $data['title'], $data['description'], $data['shortdesc'], $data['category'], $data['subcategory'], $data['image'], $quantity);
        return $product;
    }

    /*RECUPERE TOUS LES PRODUITS D'UNE CAT ET SOUS CAT ET CREE DES INSTANCES PRODUITS*/
    function selectProducts($cat, $subcat)
    {
        $datas = $this->pdo->Select('SELECT * FROM products WHERE category ="' . $cat . '" AND subcategory ="' . $subcat . '"');

        if (empty($datas)) {
            return false;
        } else {
            foreach ($datas as $data) {
                $product = new product($data['id_product'], $data['price'], $data['stock'], $data['title'], $data['description'], $data['shortdesc'], $data['category'], $data['subcategory'], $data['image'], 0);
                $products[] = $product;
            }
            return $products;
        }


    }

    /*TRI LES PRODUITS PAR PRIX*/
    /*function byPrice($products)
    {
        function cmp($a, $b) {
            return strcmp($a->getPrice(), $b->getPrice());
        }
        usort($products, "cmp");
        return $products;
    }*/
}
