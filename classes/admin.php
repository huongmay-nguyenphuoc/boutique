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
    private $subcategory;
    private $id_product;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }


    //ENREGISTRER PRODUITS
    function add($reference, $category, $subcategory, $title, $description, $shortdesc, $image, $price, $stock)
    {
        $this->pdo->Insert('Insert into products (reference, category, subcategory, title, description, shortdesc, image, price, stock) values ( :reference , :category, :subcategory, :title, :description, :shortdesc, :image, :price, :stock )',
            ['reference' => $reference,
                'category' => $category,
                'subcategory' => $subcategory,
                'title' => $title,
                'description' => $description,
                'shortdesc' => $shortdesc,
                'image' => $image,
                'price' => $price,
                'stock' => $stock,
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
    function update($reference, $category, $subcategory, $title, $description, $shortdesc, $image, $price, $stock)
    {
        $this->pdo = new database();
        $update = $this->pdo->Update("Update products SET reference = :reference, category = :category, subcategory = :subcategory, title = :title, description = :description, shortdesc = :shortdesc, image = :image, price = :price, stock = :stock WHERE id_product = $this->id_product ",
            ['reference' => $reference,
                'category' => $category,
                'subcategory' => $subcategory,
                'title' => $title,
                'description' => $description,
                'shortdesc' => $shortdesc,
                'image' => $image,
                'price' => $price,
                'stock' => $stock,
            ]);

        return $update;
    }


    function deleteUser()
    {

        unset($_SESSION['user']);

    }


    //RECUPERER TOUS LES MEMBRES

    public function allMembers()
    {
        $allmembers = $this->pdo->Select("Select * from users where 1");

        return $allmembers;
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

        return $this->subcategory;
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



}