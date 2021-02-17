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

if (isset($_POST['confirmremoveCat'])) {
    $admin->deleteCat($id);
    var_dump($admin->deleteCat($id));
    header("Location: gestion_category.php");
}




?>

<html>



<form method="post" action="delete_category.php">
    <input type="hidden" value="<?= $id ?>" name="id">
    <input type="submit" name="confirmremoveCat" value="Are you sure?">
</form>



</html>