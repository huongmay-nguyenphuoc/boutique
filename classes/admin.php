<?php

require_once('database.php');
class admin extends user{

    private $reference;
    private $category;
    private $title;
    private $desciption;
    private $shortdescription;
    private $picture;
    private $price;
    private $stock;

    private $pdo;

    public function __construct()
    {
        $this->pdo = new database();
    }



    //ENREFISTRER PRODUITS
    function register($reference, $category, $title, $description, $shortdescription, $picture, $price, $stock)
    {
        $this->pdo->Insert('Insert into products (reference, category, title, description, shortdescription, picture, price, stock) values ( :reference , :category, :title, :description, :shortdescription, :picture, :price, :stock )',
            ['reference' => $reference,
            'category' => $category,
            'title' => $title,
            'description' => $description,
            'shortdescription' => $shortdescription,
            'picture' =>$picture,
            'price' => $price,
            'stock' => $stock,
            ]);
        return $reference;
    }



public function add()
{
 
    
}





/****** Gestion des produits ******/
public function ajouter_produit($nom, $prix, $description, $image, $stock, $valorisation, $id_categorie, $id_sous_categorie, $date_ajout){
  # Ajoute un produit dans le site sans nécessairement le mettre dans une catégorie
  $produit = $this->db->query("INSERT INTO produits(nom, prix, description, image, date_ajout, stock, valorisation, id_categorie, id_sous_categorie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?) ", 
  [$nom,
  $prix,
  $description,
  $image,
  $date_ajout,
  $stock,
  $valorisation,
  $id_categorie,
  $id_sous_categorie]);
}

public function delete($id_client){
  $supp = $this->db->query("DELETE FROM utilisateurs WHERE id = ?", [$id_client]);

}

public function change_admin($boleen, $id_client){
  $change = $this->db->query("UPDATE utilisateurs SET admin = ? WHERE id = ?", [$boleen, $id_client]);

}

public function creer_categorie($new_categorie){
  $new_categorie = $this->db->query("INSERT INTO categorie(nom, nom_header) VALUES ?, ?", [$new_categorie, $new_categorie]);
}




}