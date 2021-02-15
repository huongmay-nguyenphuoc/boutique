<?php

require_once('database.php');
require_once('user.php');

class admin
{

    private $reference;
    private $category;
    private $title;
    private $description;
    private $shortdesc;
    private $image;
    private $price;
    private $stock;
    private $subcat;
    private $quantity;
    private $id_product;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }


    //ENREGISTRER PRODUITS
    function add($reference, $category, $subcat, $title, $description, $shortdesc, $image, $price, $stock, $quantity)
    {
        $this->pdo->Insert('Insert into products (reference, category, subcategory, title, description, shortdesc, image, price, stock, quantity) values ( :reference , :category, :subcategory, :title, :description, :shortdesc, :image, :price, :stock, :quantity )',
            ['reference' => $reference,
                'category' => $category,
                'subcategory' => $subcat,
                'title' => $title,
                'description' => $description,
                'shortdesc' => $shortdesc,
                'image' => $image,
                'price' => $price,
                'stock' => $stock,
                'quantity' => $quantity,
            ]);
        return $reference;
    }


    //RECUPERER HISTORIC
    public function allProducts()
    {
        $allproducts = $this->pdo->Select("SELECT * FROM products ORDER BY products.category DESC");

            return $allproducts;
    }


//SUPPRIMER PRODUIT

    public function delete()
    {

        $requser = $this->pdo->prepare('DELETE * FROM products WHERE id_product = $this->id_product');
        $requser->execute();

    }


    //UPDATE
    function update($reference, $category, $subcat, $title, $description, $shortdesc, $image, $price, $stock, $quantity)
    {
        $this->pdo = new database();
        $update = $this->pdo->Update("Update products SET reference = :reference, category = :category, subcategory = :subcategory, title = :title, description = :description, shortdesc = :shortdesc, image = :image, price = :price, stock = :stock, quantity = :quantity WHERE id_product = $this->id_product ",
            ['reference' => $reference,
                'category' => $category,
                'subcategory' => $subcat,
                'title' => $title,
                'description' => $description,
                'shortdesc' => $shortdesc,
                'image' => $image,
                'price' => $price,
                'stock' => $stock,
                'quantity' => $quantity,
            ]);

        return $update;
    }




    public function deleteProduct()
    {
        $productId = $_POST['id_product'];
        $product = $this->pdo('SELECT * FROM products WHERE $id_product = ?', [
            $productId,
        ])->fetch(\PDO::FETCH_ASSOC);
        if (!empty($product)) {
            $this->pdo('DELETE FROM products WHERE $id_product = ?', [
                $productId
            ]);

        }

        return $productId;
    }


    public function getReference()
    {

        return $this->reference;
    }

    public function getCategory()
    {

        return $this->category;
    }

    public function getSubcategory()
    {

        return $this->subcat;
    }


    public function getTitle()
    {

        return $this->title;
    }


    public function getDescription()
    {

        return $this->description;
    }


    public function getShortdesc()
    {

        return $this->shortdesc;
    }


    public function getPrice()
    {

        return $this->price;
    }


    public function getStock()
    {

        return $this->stock;
    }

    public function getQuantity()
    {

        return $this->quantity;
    }



    function deleteUser()
    {

        $userId = $_POST['id_member'];
        $user = $this->pdo->Select('SELECT * FROM users WHERE id = ? AND id = ?', [
            $_SESSION['id_member'],
            $userId
        ])->fetch(\PDO::FETCH_ASSOC);
        if(empty($user))
        {
            $this->pdo('DELETE FROM users WHERE id = ?', [
                $userId
            ]);
        }

        return $userId;

    }


    //RECUPERER TOUS LES MEMBRES

    public function allMembers()
    {
        $allmembers = $this->pdo->Select("Select * from users where 1");

        return $allmembers->fetchALl(\PDO::FETCH_ASSOC);;
    }




}