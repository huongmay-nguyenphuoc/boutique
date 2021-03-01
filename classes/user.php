<?php

require_once('database.php');
require_once('validator.php');


class user
{
    private $id_member;
    private $id_message;
    private $login;
    private $lastname;
    private $firstname;
    private $email;
    private $city;
    private $zip;
    private $adress;
    private $status;
    private $avatar;
    private $newsletter;
    private $date;
    private $message;
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
                'city' => $city,
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
        $this->id_member = $requser[0]['id_member'];
        $this->login = $requser[0]['login'];
        $this->status = $requser[0]['status'];
        $this->lastname = $requser[0]['lastname'];
        $this->firstname = $requser[0]['firstname'];
        $this->email = $requser[0]['email'];
        $this->city = $requser[0]['city'];
        $this->zip = $requser[0]['zip'];
        $this->adress = $requser[0]['adress'];
        $this->avatar = $requser[0]['avatar'];
        return $requser;
    }

    //UPDATE
    function update($login, $password, $lastname, $firstname, $email, $city, $zip, $adress, $image)
    {
        $this->pdo = new database();
        $update = $this->pdo->Update("Update users SET login = :login, password = :password, lastname = :lastname, firstname = :firstname, email = :email, city = :city, zip = :zip, adress = :adress, avatar = :image WHERE id_member = $this->id_member ",
            ['login' => $login,
                'password' => password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]),
                'lastname' => $lastname,
                'firstname' => $firstname,
                'email' => $email,
                'city' => $city,
                'zip' => $zip,
                'adress' => $adress,
                'image' => $image
            ]);
        $this->login = $login;
        $this->avatar = $image;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->zip = $zip;
        $this->adress = $adress;
        $this->city = $city;
        return $update;
    }

    function getAvatar()
    {
        return $this->avatar;
    }

    //GETID
    public function getId()
    {
        return $this->id_member;
    }

    //GETLOGIN
    public function getLogin()
    {
        return $this->login;
    }

    //GET STATUS

    public function getStatus()
    {

        return $this->status;

    }

    //GET PRENOM

    public function getFirstname()
    {

        return $this->firstname;

    }

    //GET NOM


    public function getLastname()
    {

        return $this->lastname;

    }

    //GET ADRESS

    public function getAdress()
    {

        return $this->adress;

    }

    //GET ZIP

    public function getZip()
    {

        return $this->zip;

    }

    //GET CITY

    public function getCity()
    {

        return $this->city;

    }

    //GET EMAIL

    public function getEmail()
    {

        return $this->email;

    }


    //GET NEWSLETTER

    public function getNewsletter()
    {

        return $this->newsletter;

    }



    //RECUPERER ORDERS
    public function ordersUser()
    {
        $this->pdo = new database();

        $orders_user = $this->pdo->Select("Select * FROM `order` WHERE id_member = :id_member ORDER BY order.state DESC",
            ['id_member' => 1]);
        return $orders_user;
    }

    public function ordersUserDetails($id_order)
    {
        $this->pdo = new database();

        $orders_details = $this->pdo->Select("Select * FROM `order_details` WHERE id_order = :id_order",
        ['id_order'=> $id_order]);
        return $orders_details;
    }

    //SUPPRIMER COMPTE????



    //UPDATE STATE NEWSLETTER

    public function updateState($newsletter, $id_member)
    {

        $this->pdo = new database();
        $update_state = $this->pdo->Update("Update `users` SET newsletter = :newsletter WHERE id_member = :id_member ",
            [
                'newsletter' => $newsletter,
                'id_member' => $id_member,
            ]);

        return $update_state;
    }


    //MESSAGES EMAIL

    public function registerEmail($login, $message){
        $this->pdo->Insert('Insert into contact(login, message) values(:login, :message)',
        [
            'login' => $login,
            'message' => $message,
        ]);

        return true;
    }


}


