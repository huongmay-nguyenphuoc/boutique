<?php

require_once('database.php');

require_once('validator.php');


class User
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

    private $pdo;

    function __construct()
    {
        $this->pdo = new database();
    }


    //S'ENREGISTRER
    function register($login, $password, $lastname, $firstname, $email, $city, $zip, $adress)
    {
        $this->pdo->Insert('Insert into utilisateurs (login, password; lastname, firstname, email, city, zip, adress) values ( :login , :password, :lastname, :firstname, :email, :city, :zip, :adress )',
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
        $requser = $this->pdo->Select('Select * FROM utilisateurs WHERE login = :login',
            ['login' => $login,]);
        $this->id = $requser[0]['id'];
        $this->login = $requser[0]['login'];
        return $requser;
    }

    //UPDATE
    function update($login, $password, $lastname, $firstname, $email, $city, $zip, $adress)
    {
        $this->pdo = new database();
        $update = $this->pdo->Update("Update utilisateurs SET login = :login, password = :password, lastname = :lastname, firstname = :firstname, email = :email, city = :city, zip = :zip, adress = :adress WHERE id = $this->id ",
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
    function getId()
    {
        return $this->id;
    }

    //GETLOGIN
    function getLogin()
    {
        return $this->login;
    }

}
