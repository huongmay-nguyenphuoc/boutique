<?php

require_once('database.php');

require_once('validator.php');


class user
{
    private $id;
    private $login;
    private $password;
    private $lastname;
    private $firstname;
    private $email;
    private $city;
    private $zip;
    private $adress;
    private $etat_panier = false; #vide

    private $pdo;

    function __construct()
    {
        $this->pdo = new database();
    }


    //S'ENREGISTRER
    function register($login, $password, $lastname, $firstname, $email, $city, $zip, $adress)
    {
        $this->pdo->Insert('Insert into users (login, password, lastname, firstname, email, city, zip, adress) values ( :login , :password, :lastname, :firstname, :email, :city, :zip, :adress )',
            ['login' => $login,
            'password' => password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]),
            'lastname' => $lastname,
            'firstname' => $firstname,
            'email' => $email,
            'city' =>$city,
            'zip' => $zip,
            'adress' => $adress,
            ]);
        return $login;
    }

    //SE CONNECTER ET RECUPERER LES DONNEES
    function connect($login)
    {
        $requser = $this->pdo->Select('Select * FROM users WHERE login = :login',
            ['login' => $login,]);
        $this->id = $requser[0]['id'];
        $this->login = $requser[0]['login'];
        return $requser;
    }

    //UPDATE
    function update($login, $password, $lastname, $firstname, $email, $city, $zip, $adress)
    {
        $this->pdo = new database();
        $update = $this->pdo->Update("Update users SET login = :login, password = :password, lastname = :lastname, firstname = :firstname, email = :email, city = :city, zip = :zip, adress = :adress WHERE id = $this->id ",
            ['login' => $login, 
            'password' => password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]),
            'lastname' => $lastname,
            'firstname' => $firstname,
            'email' => $email,
            'city' =>$city,
            'zip' => $zip,
            'adress' => $adress,
            ]);
        $this->login = $login;
        return $update;
    }

    //GETID
    public function getId()
    {
        return $this->id;
    }

    //GETLOGIN
    public function getLogin()
    {
        return $this->login;
    }

    //SUPPRIMER COMPTE????


    public function afficherHistorique($id){

        $requete = $this->pdo->Select("Select * FROM historique INNER JOIN products ON id_products = products_id WHERE id = ? ORDER BY date_achat DESC", ['$id']);
        $historique = $requete->fetchall(PDO::FETCH_ASSOC);

      echo '<table>';
      echo '<thead>';
      echo '<th> Produit </th>';
      echo '<th> Prix </th>';
      echo '<th> Quantité </th>';
      echo '<th> Date d\'Achat </th>';
      echo '</thead>';
      echo '<tbody>';

      foreach($historique as $recap){
        echo '<tr>';
        echo '<td>'.$recap['nom'].'</td>';
        echo '<td>'.$recap['prix'].'</td>';
        echo '<td>'.$recap['quantite'].'</td>';
        echo '<td>'.$recap['date_achat'].'</td>';
        echo '</tr>';
      }
      echo '</tbody>';
      echo '</table>';
    }


}
