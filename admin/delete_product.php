<?php
require_once '../classes/admin.php';

if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() != 1) {
    header('location:../pages/connexion.php');
}
else {
    $admin = new admin;


    $id = htmlspecialchars($_POST['id']);


    if (isset($_POST['confirmremoveProduct'])) {
        $admin->deleteProduct($id);
        header("Location: produits.php");
    }

}
?>


<html>

<?php include 'includes/header.php'; ?>

<h1>Delete Product</h1>

<div>
    <form method="post" action="delete_product.php">
        <input type="hidden" value="<?= $id ?>" name="id">
        <input type="submit" name="confirmremoveProduct" value="Are you sure?">
    </form>
</div>

<?php include 'includes/footer.php'; ?>

