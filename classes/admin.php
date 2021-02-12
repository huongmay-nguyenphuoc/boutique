<?php

require_once('database.php');
require_once('user.php');

class admin
{

    private $reference;
    private $category;
    private $title;
    private $description;
    private $short_description;
    private $picture;
    private $price;
    private $stock;
    private $subcategory;

    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }


    //ENREGISTRER PRODUITS
    function add($reference, $category, $subcategory, $title, $description, $short_description, $picture, $price, $stock)
    {
        $this->pdo->Insert('Insert into products (reference, category, subcategory, title, description, short_description, picture, price, stock) values ( :reference , :category, :subcategory, :title, :description, :shortdescription, :picture, :price, :stock )',
            ['reference' => $reference,
                'category' => $category,
                'subcategory' => $subcategory,
                'title' => $title,
                'description' => $description,
                'short_description' => $short_description,
                'picture' => $picture,
                'price' => $price,
                'stock' => $stock,
            ]);
        return $reference;
    }


    //RECUPERER HISTORIC
    public function productsHistoric()
    {
        $productsHistoric = $this->pdo->Select("SELECT * FROM products ORDER BY products.category DESC");
        return $productsHistoric;
    }


//SUPPRIMER PRODUIT

    public function delete()
    {

        $requser = $this->pdo->prepare('DELETE * FROM products WHERE id_product = $this->id_product');
        $requser->execute();

    }


    //UPDATE PRODUIT



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


    public function getShortdescription()
    {

        return $this->short_description;
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