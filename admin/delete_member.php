<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';

    $admin = new admin;

    $id = htmlspecialchars($_POST['id']);


    if (isset($_POST['confirmremoveUser'])) {
        $admin->deleteUser($id);
        header("Location: gestion_membres.php");
    }




?>

<html>


<?php include 'includes/header.php'; ?>

<h1>Delete Member</h1>

<form method="post" action="delete_member.php">
    <input type="hidden" value="<?= $id ?>" name="id">
    <input type="submit" name="confirmremoveUser" value="Are you sure?">
</form>



<?php include 'includes/footer.php'; ?>