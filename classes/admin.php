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
    private $id_product;
    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }


    //ENREGISTRER PRODUITS
    function add($reference, $category, $subcat, $title, $description, $shortdesc, $image, $price, $stock)
    {
        $this->pdo->Insert('Insert into products (reference, category, subcat, title, description, shortdesc, image, price, stock) values ( :reference , :category, :subcat, :title, :description, :shortdesc, :image, :price, :stock)',
            ['reference' => $reference,
                'category' => $category,
                'subcat' => $subcat,
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
        $allproducts = $this->pdo->Select("SELECT category, subcat, title, description, shortdesc, price, stock FROM products ORDER BY products.category DESC");

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
        $update = $this->pdo->Update("Update products SET reference = :reference, category = :category, subcat = :subcat, title = :title, description = :description, shortdesc = :shortdesc, image = :image, price = :price, stock = :stock, quantity = :quantity WHERE id_product = $this->id_product ",
            ['reference' => $reference,
                'category' => $category,
                'subcat' => $subcat,
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



public function deleteProduct(){
        $deletep = $this->pdo->Delete("Delete from products WHERE id_product = id_product" );

        return deletep;
}



    public function getReference()
    {

        return $this->reference;
    }

    public function getCategory()
    {

        return $this->category;
    }

    public function getSubcat()
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




    //RECUPERER TOUS LES MEMBRES

    public function allMembers()
    {
        $allmembers = $this->pdo->Select("Select login, lastname, firstname, email, city, zip, city, adress from users where 1");

        return $allmembers;
    }




}