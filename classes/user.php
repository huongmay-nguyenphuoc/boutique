<?php

require_once('database.php');
require_once('validator.php');


class user
{
    private $id_member;
    private $login;
    private $lastname;
    private $firstname;
    private $email;
    private $city;
    private $zip;
    private $adress;
    private $status;
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
        $this->id_member = $requser[0]['id_member'];
        $this->login = $requser[0]['login'];
        $this->status =  $requser[0]['status'];
        $this->lastname = $requser[0]['lastname'];
        $this->firstname = $requser[0]['firstname'];
        $this->email =  $requser[0]['email'];
        $this->city = $requser[0]['city'];
        $this->zip = $requser[0]['zip'];
        $this->adress =  $requser[0]['adress'];
        return $requser;
    }

    //UPDATE
    function update($login, $password, $lastname, $firstname, $email, $city, $zip, $adress)
    {
        $this->pdo = new database();
        $update = $this->pdo->Update("Update users SET login = :login, password = :password, lastname = :lastname, firstname = :firstname, email = :email, city = :city, zip = :zip, adress = :adress WHERE id_member = $this->id_member ",
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
        return $this->id_member;
    }

    //GETLOGIN
    public function getLogin()
    {
        return $this->login;
    }

    //GET STATUS

    public function getStatus(){

        return $this->status;

    }

    //GET PRENOM

    public function getFirstname(){

        return $this->firstname;

    }

    //GET NOM


    public function getLastname(){

        return $this->lastname;

    }

    //GET ADRESS

    public function getAdress(){

        return $this->adress;

    }

    //GET ZIP

    public function getZip(){

        return $this->zip;

    }

    //GET CITY

    public function getCity(){

        return $this->city;

    }

    //GET EMAIL

    public function getEmail(){

        return $this->email;

    }


    //RECUPERER HISTORIC
    public function cartHistoric()
    {
        $cartHistoric = $this->pdo->Select("SELECT id_order, amount, date_register, state FROM `order` WHERE id_member = :id_member ORDER BY order.state DESC",
            ['id_member' => $this->id_member]);
        return $cartHistoric;
    }


    public function cartHistoricdetails($id_order)
    {
        $details = $this->pdo->Select('SELECT * from `order_details` WHERE id_order = :id_order',
            ['id_order' => $id_order]);
        return $details;
    }

    //SUPPRIMER COMPTE????


}

$user = new user();
$user->connect('may');
var_dump($user);
$products = $user->cartHistoric();
var_dump($user->cartHistoricdetails(26));

/*Traitement bouton description*/
if (isset($_POST['show'])) {
    $show[$_POST["value"]] = true;
}


?>

<ul>
        <?php $i = 0; ?>
        <?php foreach ($products as $product) : ?>
            <li>
                <ul>
                    <li><?= $product['id_order'] ?></li>
                    <li>
                        <form method="post">
                            <input type="hidden" name="value" value="<?= $i ?>">
                            <input type="submit" name="show" value="show"></form>
                    </li>
                    <?php if (isset($show[$i])) : ?>
                        <li><?= var_dump($user->cartHistoricdetails($product['id_order'])) ?></li>
                    <?php endif; ?>
                </ul>
                <?php $i++; ?>
            </li>

        <?php endforeach; ?>
    </ul>