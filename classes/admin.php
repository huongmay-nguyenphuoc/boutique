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


    public function updateProduct()
    {
        if (isset($_GET['confirm']) and !empty($_GET['confirm'])) {
            $confirm = (int)$_GET['confirm'];

            $requete = $this->pdo->prepare('UPDATE products SET confirm = 1 WHERE id = $this->id');
            $requete->execute(array($confirm));
        }
    }


    public function deleteProduct()
    {
        if (isset($_GET['supprime']) and !empty($_GET['supprime'])) {
            $supprime = (int)$_GET['supprime'];

            $requete = $this->pdo->prepare('DELETE FROM products WHERE id = $this->id');
            $requete->execute(array($supprime));
        }
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


    //RECUPERER HISTORIC
    public function productsHistoric($reference, $category, $subcategory, $title, $description, $short_description, $picture, $price, $stock)
    {
        $productsHistoric = $this->pdo->Select("SELECT reference, category, subcategory, title, description, short_description, picture, price, stock FROM products ORDER BY products.category DESC",
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
        return $productsHistoric;
    }


//SUPPRIMER PRODUIT

    public function delete()
    {

        $requser = $this->pdo->prepare('DELETE * FROM products WHERE id_product = $this_>id_product');
        $requser->execute();

    }
}