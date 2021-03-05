<?php

require_once('database.php');
require_once('validator.php');


class user
{
    private $id_member;
    private $id_message;
    private $id_review;
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
    private $date_message;
    private $message;
    private $title;
    private $date_review;
    private $message_review;
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
        $this->newsletter = $requser[0]['newsletter'];
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







    //UPDATE STATE NEWSLETTER

    public function updateState($newsletter, $id_member)
    {

        $this->pdo = new database();
        $update_state = $this->pdo->Update("Update `users` SET newsletter = :newsletter WHERE id_member = :id_member ",
            [
                'newsletter' => $newsletter,
                'id_member' => $id_member,
            ]);
        $this->newsletter = $newsletter;


    }


    //MESSAGES EMAIL

    public function registerEmail($message, $id_member, $date_message, $title){
        $this->pdo = new database();
        $add_mail = $this->pdo->Insert('Insert into contact(message, id_member, date_message, title) values(:message, :id_member, :date_message, :title)',
            [
                'message' => $message,
                'id_member' => $id_member,
                'date_message' => $date_message,
                'title' => $title,
            ]);

        return $add_mail;
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

    //GET REVIEW

    public function getReview()
    {

        return $this->review;

    }



    //RECUPERER ORDERS
    public function ordersUser()
    {
        $this->pdo = new database();

        $orders_user = $this->pdo->Select("Select * FROM `order` WHERE id_member = :id_member ORDER BY order.id_order DESC",
            ['id_member' => $this->id_member]);
        return $orders_user;
    }

    public function ordersUserDetails($id_order)
    {
        $this->pdo = new database();

        $orders_details = $this->pdo->Select("Select * FROM `order_details` WHERE id_order = :id_order",
        ['id_order'=> $id_order]);
        return $orders_details;
    }



    //ENVOYER LES AVIS

    public function addReview($message_review, $id_member, $date_review){

        $this->pdo = new database();
        $add_review = $this->pdo->Insert('Insert into review(message_review, id_member, date_review) values(:message_review, :id_member, :date_review)',
            [
                'message_review' => $message_review,
                'id_member' => $id_member,
                'date_review' => $date_review,
            ]);

        return $add_review;
    }




}





