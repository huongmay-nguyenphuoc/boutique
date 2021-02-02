<?php

require_once('user.php');

class validator{

    private $id;
    private $login;
    private $password;
    private $passwordcheck;
    private $db;


function userExists($login){

    $check = $this->db->prepare('SELECT login FROM users WHERE login = ?');
    if (!empty($check)) {
        return 1;
    } else {
        return 0;
    }

    
}

function passwordConfirm($password, $passwordcheck){

    if($password == $passwordcheck){

        return 1;
    }

    else{
        return 0;
    }
}

function passwordStrenght($password){

    if (!preg_match("#[0-9]+#", $password)) {
       
        return 0;

    } else {
        
        return 1;
    }
}


function sameLogin($login, $firstlogin){

    if ($login != $firstlogin) {

        return 1;

    } else {

        return 0;
    }

}


function passwordConnect($login, $password){

$checkpassword = $this->db->prepare('SELECT password from users WHERE login = $this->login');

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
?>