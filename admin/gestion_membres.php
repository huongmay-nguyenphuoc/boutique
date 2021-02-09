<?php

require_once '../classes/admin.php';

require_once '../classes/user.php';

session_start();



if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1){
    exit();
    
}




