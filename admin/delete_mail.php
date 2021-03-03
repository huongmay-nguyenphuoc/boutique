<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';

$title = 'delete mail';

if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() != 1) {
    header('location:../pages/connexion.php');
}
else {
    $admin = new admin;

    $id = htmlspecialchars($_POST['id']);


    if (isset($_POST['confirmremoveMail'])) {
        $admin->deleteMail($id);
        header("Location: mail.php");
    }

}


?>



<?php include 'includes/header.php'; ?>

    <h1>Delete Mail</h1>

    <form method="post" action="delete_mail.php">
        <input type="hidden" value="<?= $id ?>" name="id">
        <input class="delete" type="submit" name="confirmremoveMail" value="Are you sure?">
    </form>



<?php include 'includes/footer.php'; ?>