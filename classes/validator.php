<?php
require_once('database.php');
require_once('user.php');


class validator
{
    private $id_member;
    private $login;
    private $password;
    private $passwordcheck;
    private $pdo;


    //CONSTRUCTION
    function __construct()
    {
        $this->pdo = new database();
    }

    // vérification login existant
    function userExists($login)
    {
        $check = $this->pdo->Select('Select * FROM users WHERE login = :login', ['login' => $login]);
        if (!empty($check)) {
            return 1;
        } else {
            return 0;
        }
    }

    // vérification passwords identiques
    function passwordConfirm($password, $passwordcheck)
    {
        if ($password === $passwordcheck) {
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

    // vérification login identique pour éviter un doublon (update)
    function sameLogin($login, $firstlogin)
    {
        if ($login != $firstlogin) {
            return 1;
        } else {
            return 0;
        }
    }


    // vérification bons identifiants connexion
    function passwordConnect($login, $password)
    {
        $checkpassword = $this->pdo->Select('Select password from users WHERE login = :login',
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

    //VERIFICATION EMAIL UNIQUE !!!!!!!
}