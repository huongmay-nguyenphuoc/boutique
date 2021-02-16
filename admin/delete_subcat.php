<?php

require_once '../classes/admin.php';
require_once '../classes/product.php';
require_once '../classes/user.php';

session_start();


var_dump($_POST);

$admin = new admin;
var_dump($admin);

$id = htmlspecialchars($_POST['id']);

echo $id;

if (isset($_POST['confirmremoveSubcat'])) {
    $admin->deleteSubcat($id);
    var_dump($admin->deleteSubcat($id));
    header("Location: gestion_subcat.php");
}




?>

<html>

