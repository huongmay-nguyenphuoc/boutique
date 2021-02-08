<?php

require_once("includes/init.inc.php");
require_once('validator.php');

class user{
    private $db;
    private $id_member;
    private $login;
    private $password;
    private $firstname;
    private $lastname;
    private $email;
    private $city;
    private $zip;
    private $adress;


function register($login, $password, $lastname, $firstname, $email, $city, $zip, $adress){

$request = $this->db->prepare('INSERT INTO users (login, password, lastname, firstname, email, city, zip, adress) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
$request->execute(array($login, password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]), $lastname, $firstname, $email, $city, $zip, $adress));
return 1;
}


function connect($login){

    $requser = $this->db->prepare('SELECT * FROM users WHERE login = $this->login');
        $this->id = $requser[0]['id'];
        $this->login = $requser[0]['login'];
        return $requser;
}

function update($login, $password, $fistname, $lastname, $email, $city, $zip, $adress){

    $update = $this->db->prepare("UPDATE users SET login = ?, password = ?, firstname = ?, lastname = ?, email = ?, city = ?, zip = ?, adress = ?  WHERE id = $this->id ",
        ['login' => $login, 'password' => password_hash($password, PASSWORD_BCRYPT, ["cost" => 10])]);
    $this->login = $login;
    return $update;
}


function getId(){

    return $this->id;
}


function getLogin(){

    return $this->login;

}


}


?>