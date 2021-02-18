<?php

require_once('database.php');
require_once('user.php');
require_once('order.php');
require_once ('product.php');

class admin
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }









    /************************PRODUIT****************************/

    //CHECK REFERENCE EXISTS
    public function checkProductExists($reference, $title)
    {
        $product = $this->pdo->Select('SELECT reference, title FROM products WHERE reference = :ref or title = :title',
            ['ref' => $reference, 'title' => $title]);
        if (!empty($product)) {
            return true;
        } else {
            return false;
        }
    }

    //ENREGISTRER PRODUITS
    public function add($reference, $category, $subcat, $title, $description, $shortdesc, $price, $stock, $image)
    {
        $this->pdo->Insert('Insert into `products` (reference, category, subcategory, title, description, shortdesc, price, stock, image) values( :reference , :category, :subcat, :title, :description, :shortdesc, :price, :stock, :image)',
            ['reference' => $reference,
                'category' => $category,
                'subcat' => $subcat,
                'title' => $title,
                'description' => $description,
                'shortdesc' => $shortdesc,
                'price' => $price,
                'stock' => $stock,
                'image' => $image,
            ]);
        return true;
    }


    //RECUPERER ALL PRODUCTS
    public function allProducts()
    {
        $allproducts = $this->pdo->Select("SELECT * FROM products ORDER BY products.category DESC");
        return $allproducts;
    }

    /*RECUPERE INFOS D'UN PRODUIT ET CREE UNE INSTANCE PRODUIT*/
    public function selectProduct($id)
    {
        $data = $this->pdo->Select('SELECT * FROM products WHERE id_product ="' . $id . '"');
        $data = $data[0];
       return $data;
    }


    //UPDATE PRODUIT

    public function update($reference, $category, $subcat, $title, $image, $description, $shortdesc, $price, $stock, $id_product)
    {
        $this->pdo = new database();
        $update = $this->pdo->Update("Update products SET reference = :reference, category = :category, subcategory = :subcat, title = :title, description = :description, shortdesc = :shortdesc, price = :price, stock = :stock, image = :image WHERE id_product = :id_product ",
            ['reference' => $reference,
                'category' => $category,
                'subcat' => $subcat,
                'title' => $title,
                'description' => $description,
                'shortdesc' => $shortdesc,
                'image' => $image,
                'price' => $price,
                'stock' => $stock,
                'id_product' => $id_product,
            ]);
        return true;
    }


    //SUPPRIMER PRODUIT
    public function deleteProduct($id_product)
    {
        $delete_product = $this->pdo->Delete("Delete from products WHERE id_product = :id_product",
            ['id_product' => $id_product,
            ]);
        return $delete_product;
    }



    /*VERIFIE EXISTENCE PRODUIT*/

   public function productExists($id)
    {
        $product = $this->pdo->Select('SELECT id_product FROM products WHERE id_product = "' . $id . '"');
        if (!empty($product)) {
            return $product;
        } else {
            return false;
        }
    }












    /***********************COMMANDES****************************/
    //RECUPERER ORDERS
    public function allOrders()
    {
        $all_orders = $this->pdo->Select("SELECT * FROM `order` ORDER BY `order`.state DESC");

        return $all_orders;
    }


    //UPDATE STATE
    public function updateState($state, $id_order)
    {

        $this->pdo = new database();
        $update_state = $this->pdo->Update("Update `order` SET state = :state WHERE id_order = :id_order ",
            [
                'state' => $state,
                'id_order' => $id_order,
            ]);

        return $update_state;
    }


    //SUPPRIMER ORDER
    public function deleteOrder($id_order)
    {
        $delete_order = $this->pdo->Delete("Delete from `order` WHERE id_order = :id_order",
            ['id_order' => $id_order,
            ]);
        return $delete_order;
    }














    /******************************MEMBRES*********************************/


    //RECUPERER TOUS LES MEMBRES

    public function allMembers()
    {
        $allmembers = $this->pdo->Select("Select * from users");

        return $allmembers;
    }


//SUPPRIMER MEMBER

    public function deleteUser($id_member)
    {
        $delete_user = $this->pdo->Delete("Delete from users WHERE id_member = :id_member",
            ['id_member' => $id_member,
            ]);

        return $delete_user;
    }




}
