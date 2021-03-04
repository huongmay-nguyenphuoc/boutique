<?php

$title = "Profil Admin";
require_once '../classes/user.php';
require_once '../classes/validator.php';
require_once '../classes/admin.php';

if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() != 1) {
    header('location:../pages/connexion.php');
}






?>



<?php include 'includes/header.php'; ?>
<main>
<h1>Control Center</h1>

<section class="index">
    <a href="gestion_commande.php">all orders</a><br><br>
    <a href="gestion_membres.php">all members</a><br>
    <a href="gestion_category.php">all categories</a><br><br>
    <a href="gestion_subcategory.php">all subcategories</a><br><br>
    <a href="produits.php">all products</a><br><br>
    <a href="product_form.php">add new product</a><br><br>
    <a href="mail.php">all inbox messages</a><br><br>

</section>
</main>
<?php include 'includes/footer.php'; ?>

