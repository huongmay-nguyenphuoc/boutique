<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';

$title = 'delete subcategory';

if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() != 1) {
    header('location:../pages/connexion.php');
}
else {
    $admin = new admin;

    $id = htmlspecialchars($_POST['id']);


    if (isset($_POST['confirmremoveSubcat'])) {
        $admin->deleteSubcat($id);
        header("Location: gestion_subcategory.php");
    }

}


?>

    <html>


<?php include 'includes/header.php'; ?>

    <h1>Delete Subcategory</h1>

    <form method="post" action="delete_subcategory.php">
        <input type="hidden" value="<?= $id ?>" name="id">
        <input class="delete" type="submit" name="confirmremoveSubcat" value="Are you sure?">
    </form>



<?php include 'includes/footer.php'; ?>