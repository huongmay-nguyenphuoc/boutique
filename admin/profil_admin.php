<?php


require_once '../classes/user.php';
require_once '../classes/validator.php';




//if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1){
  //  header('location:connexion.php');
//}





?>

<html lang="en">


<?php include '../includes/header.php'; ?>





    <h3><em>Profil @<?php echo $_SESSION['user']->getLogin(); ?></em></h3>

    <a class="waves-effect waves-light white black-text btn-small" href="gestion_commande.php">Page des commandes clients</a><br><br>
    <a class="waves-effect waves-light white black-text btn-small" href="gestion_membres.php">Gérer les membres</a><br><br>
    <a class="waves-effect waves-light white black-text btn-small" href="produits.php">Gérer les produits</a><br><br>
    <a class="waves-effect waves-light white black-text btn-small" href="product_form.php">Formulaire ajout produits</a><br><br>
    <a class="waves-effect waves-light white black-text btn-small" href="update_product.php">Mettre à jour des produits</a><br><br>
    <a class="waves-effect waves-light white black-text btn-small" href="../pages/update.php">Modifier le profil</a><br><br>
    <a class="waves-effect waves-light white black-text btn-small" href="../pages/boutique.php">Accès à la boutique en ligne</a>



</html>