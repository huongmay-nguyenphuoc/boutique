<?php

require_once '../classes/user.php';

session_start();


$title = "Newsletter";
$bodyname = "bodyuser";

if (!isset($_SESSION['user'])) {
    header('location: connexion.php');
}


if($_SESSION['user']){

    if (isset($_POST['submit'])) {


        $newsletter = htmlspecialchars($_POST['newsletter']);
        $id_member = htmlspecialchars($_POST['id']);

        $_SESSION['user']->updateState($newsletter, $id_member);
        $success = "State has been udpated<a href='profil.php'>Profile</a>";


    }


}


?>

<?php include '../includes/header_user.php'; ?>

<h1>Newsletter</h1>
<main class="news">




    <form method='post' action='newsletter.php' class="formnews">
        <input type="hidden" value="<?= $_SESSION['user']->getId() ?>" name="id">
        <label for="newsletter">state</label><br>
        <select name="newsletter" id="newsletter" required>
            <option selected value="<?= $_SESSION['user']->getNewsletter() ?>"> <?= $_SESSION['user']->getNewsletter() ?> </option>
            <option value='yes'> Yes please </option>
            <option value='no'> No sorry</option>
        </select><br><br>
        <button class= type="submit" name="submit">Send</button>
    </form>


    <section class="shopKeeperNews">
        <p class="bubbleNews"><b>Don't forget to update your Newsletter state</b></p>
    </section>

</main>

<?php include '../includes/footer.php'; ?>