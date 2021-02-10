<?php

require_once('database.php');
require_once('user.php');

class admin{

    private $reference;
    private $category;
    private $title;
    private $description;
    private $short_description;
    private $picture;
    private $price;
    private $stock;

    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }



    //ENREGISTRER PRODUITS
    function add($reference, $category, $title, $description, $short_description, $picture, $price, $stock)
    {
        $this->pdo->Insert('Insert into products (reference, category, title, description, short_description, picture, price, stock) values ( :reference , :category, :title, :description, :shortdescription, :picture, :price, :stock )',
            ['reference' => $reference,
            'category' => $category,
            'title' => $title,
            'description' => $description,
            'short_description' => $short_description,
            'picture' =>$picture,
            'price' => $price,
            'stock' => $stock,
            ]);
        return $reference;
    }






public function updateProduct(){
    if(isset($_GET['confirm']) AND !empty($_GET['confirm'])){
        $confirm = (int) $_GET['confirm'];

        $requete = $pdo->prepare('UPDATE products SET confirm = 1 WHERE id = $this->id');
        $requete->execute(array($confirm));
    }
}


public function deleteProduct(){
    if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){
        $supprime = (int) $_GET['supprime'];

        $requete = $pdo->prepare('DELETE FROM products WHERE id = $this->id');
        $requete->execute(array($supprime));
    }
}

/*
public function creer_categorie($new_categorie){
  $new_categorie = $this->db->query("INSERT INTO categorie(nom, nom_header) VALUES ?, ?", [$new_categorie, $new_categorie]);
}
*/



}