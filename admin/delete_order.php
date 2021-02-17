<?php

require_once '../classes/admin.php';
require_once '../classes/order.php';
require_once '../classes/product.php';

//session_start();


var_dump($_POST);

$admin = new admin;
var_dump($admin);

$id = htmlspecialchars($_POST['id']);

echo $id;

if (isset($_POST['confirmremoveOrder'])) {
    $admin->deleteProduct($id);
    var_dump($admin->deleteProduct($id));
    //header("Location: gestion_commande.php");
}




?>


<html>

<div>

    <form method="post" action="delete_order.php">
        <input type="hidden" value="<?= $id ?>" name="id">
        <input type="submit" name="confirmremoveOrder" value="Are you sure?">
    </form>
</div>


</html>

