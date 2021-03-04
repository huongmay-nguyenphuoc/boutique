<?php

require_once '../classes/user.php';


session_start();

$title = "Newsletter";
$bodyname = "bodyuser";

if (!isset($_SESSION['user'])) {
    header('location: connexion.php');
}


if ($_SESSION['user']) {

    if (isset($_POST['submit'])) {


        $newsletter = htmlspecialchars($_POST['newsletter']);
        $id_member = htmlspecialchars($_POST['id']);


        if (empty($errors)) {
            $_SESSION['user']->updateState($newsletter, $id_member);


            if ($newsletter == 'yes') {
                $success = "Thanks, you won't be disappointed!";
            } elseif ($newsletter == 'no') {
                $success = "Oh really? :( I respect your decision ...";
            }
        }

    }


}


?>

<?php include '../includes/header_user.php'; ?>

    <h1>Newsletter</h1>
    <main>

        <section class="news">
            <form method='post' action='newsletter.php' class="formnews">
                <input type="hidden" value="<?= $_SESSION['user']->getId() ?>" name="id">
                <label for="newsletter">state</label><br>
                <select name="newsletter" id="newsletter" required>

                    <?php if ($_SESSION['user']->getNewsletter() == 'yes') : ?>
                        <option selected value='yes'> Yes please</option>
                        <option value='no'> No sorry</option>

                    <?php elseif ($_SESSION['user']->getNewsletter() == 'no') : ?>
                        <option value='yes'> Yes please</option>
                        <option selected value='no'> No sorry</option>
                    <?php endif; ?>

                </select><br><br>
                <div>
                <button id="formSubmitNews" type="submit" name="submit">Send</button>
                </div>
            </form>


            <section class="shopKeeperNews">
                <p class="bubbleNews"><b>Don't forget to update your Newsletter state!</b></p>
            </section>
        </section>

        <section class="errors">
            <!--Alerte (erreur ou succès)-->
            <?php if (!empty($errors)): ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php elseif (isset($success)): ?>
                <div class="error">
                    <p><?php echo $success; ?></p>
                </div>
            <?php endif; ?>
        </section>


        <?php
        if ($_SESSION['user']->getNewsletter() == "yes") {
            echo "<a href='news.php'><button>NEWSLETTER OF THE MOMENT</button></a>";
        }
        ?>
    </main>

<?php include '../includes/footer.php'; ?>