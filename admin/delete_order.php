<?php

require_once '../classes/admin.php';
require_once '../classes/order.php';
require_once '../classes/product.php';


$admin = new admin;


$id = htmlspecialchars($_POST['id']);



if (isset($_POST['confirmremoveOrder'])) {

    $admin->deleteOrder($id);
    header("Location: gestion_commande.php");
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

