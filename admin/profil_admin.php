<?php


require_once '../classes/user.php';
require_once '../classes/validator.php';
require_once '../classes/admin.php';

if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() != 1) {
    header('location:../pages/connexion.php');
}






?>



<?php include 'includes/header.php'; ?>

<h1>Control Center</h1>

<section class="index">
    <a href="gestion_commande.php">Customers orders</a><br><br>
    <a href="gestion_membres.php">all members</a><br>
    <a href="gestion_category.php">all categories</a><br><br>
    <a href="gestion_subcategory.php">all subcategories</a><br><br>
    <a href="produits.php">all products</a><br><br>
    <a href="product_form.php">add new product</a><br><br>

</section>

<?php include 'includes/footer.php'; ?>

