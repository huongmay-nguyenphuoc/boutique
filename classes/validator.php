<?php
<<<<<<< Updated upstream

=======
require_once('database.php');
>>>>>>> Stashed changes
require_once('user.php');


class validator
{
    private $id;
    private $login;
    private $password;
    private $password2;
    private $pdo;


    //CONSTRUCTION
    function __construct()
    {
        $this->pdo = new database();
    }

    // vérification login existant
    function userExists($login)
    {
        $check = $this->pdo->Select('Select * FROM utilisateurs WHERE login = :login', ['login' => $login]);
        if (!empty($check)) {
            return 1;
        } else {
            return 0;
        }
    }

    // vérification passwords identiques
    function passwordConfirm($password, $password2)
    {
        if ($password === $password2) {
            return 1;

        } else {
            return 0;
        }
    }

    //vérification chiffre dans password
    function passwordStrenght($password)
    {
        if (!preg_match("#[0-9]+#", $password)) {
            return 0;
        } else {
            return 1;
        }
    }

<<<<<<< Updated upstream
}


function passwordConnect($login, $password){

$checkpassword = $this->db->prepare('SELECT password from users WHERE login = $this->login');

    if (!empty($checkpassword)) {

        $auth = password_verify($password, $checkpassword[0]['password']);

        if ($auth == 1) {
    
=======
    // vérification login identique pour éviter un doublon (update)
    function sameLogin($login, $firstlogin)
    {
        if ($login != $firstlogin) {
>>>>>>> Stashed changes
            return 1;
        } else {
            return 0;
        }
    }


    // vérification bons identifiants connexion
    function passwordConnect($login, $password)
    {
        $checkpassword = $this->pdo->Select('Select password from utilisateurs WHERE login = :login',
            ['login' => $login]);

        if (!empty($checkpassword)) {
            $auth = password_verify($password, $checkpassword[0]['password']);
            if ($auth == 1) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

}