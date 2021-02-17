<?php
require_once '../classes/admin.php';
$admin = new admin;
//var_dump($admin);
//var_dump($_POST);
$id = htmlspecialchars($_POST['id']);
if (isset($_POST['confirmremoveProduct'])) {
    $admin->deleteProduct($id);
    header("Location: produits.php");
}


?>


<html>

<div>
    <form method="post" action="delete_product.php">
        <input type="hidden" value="<?= $id ?>" name="id">
        <input type="submit" name="confirmremoveProduct" value="Are you sure?">
    </form>
</div>

</html>

