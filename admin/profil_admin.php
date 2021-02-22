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

    <a class="waves-effect waves-light btn-small blue lighten-3" href="gestion_commande.php"><i class="material-icons left">shopping_cart</i>Customers orders</a><br><br>
    <a class="waves-effect waves-light btn-small blue lighten-3" href="gestion_membres.php"><i class="material-icons left">account_circle</i>all members profile</a><br><br>
    <a class="waves-effect waves-light btn-small blue lighten-3" href="produits.php"><i class="material-icons left">cloud</i>all products</a><br><br>
    <a class="waves-effect waves-light btn-small blue lighten-3" href="product_form.php"><i class="material-icons left">add_circle</i>add new product</a><br><br>
    <a class="waves-effect waves-light btn-small blue lighten-3" href="../pages/update.php"><i class="material-icons left">assignment_turned_in</i>Update profile</a><br><br>
    <a class="waves-effect waves-light btn-small blue lighten-3" href="../pages/categorie.php"><i class="material-icons left">home</i>Access Shop</a><br><br>


<?php include 'includes/footer.php'; ?>

