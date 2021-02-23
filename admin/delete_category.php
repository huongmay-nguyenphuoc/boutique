<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';
if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() != 1) {
    header('location:../pages/connexion.php');
}
else {
    $admin = new admin;

    $id = htmlspecialchars($_POST['id']);


    if (isset($_POST['confirmremoveCat'])) {
        $admin->deleteCategory($id);
        header("Location: gestion_category.php");
    }

}


?>

    <html>


<?php include 'includes/header.php'; ?>

    <h1>Delete Category</h1>

    <form method="post" action="delete_category.php">
        <input type="hidden" value="<?= $id ?>" name="id">
        <input class="delete" type="submit" name="confirmremoveCat" value="Are you sure?">
    </form>



<?php include 'includes/footer.php'; ?>