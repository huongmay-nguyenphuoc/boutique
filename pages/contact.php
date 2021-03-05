<?php
require_once '../classes/user.php';

session_start();

$title = "Contact";
$bodyname = "bodyuser";


if(isset($_SESSION['user'])) {

    if (isset($_POST['submit'])) {

        $id_member = $_SESSION['user']->getId();
        $message = htmlspecialchars($_POST['message']);
        $title = htmlspecialchars($_POST['title']);

        if (!empty($message)) {
            //date_default_timezone_get('Europe/Paris');
            $date_message = date("Y-m-d");


            if (empty($errors)) {
                $_SESSION['user']->registerEmail($message, $id_member, $date_message, $title);
                $success = "bravo";

            }

        }

    }

}



?>


<?php include '../includes/header.php'; ?>

    <h1>Contact form</h1>


<main class="contact">


<form method="POST" action="contact.php" name="formcontact" class="formcontact">
    <label for="login">LOGIN</label><br>
    <input placeholder="login" id="login" type="text" name="login" maxlength="20"
           value="<?php echo $_SESSION['user']->getLogin(); ?>"><br><br>

    <label for="title">title</label><br>
    <input placeholder="title" id="title" type="text" name="title" required><br><br>

    <label for="message">Message</label><br>
    <textarea name="message" cols="15" rows="6" placeholder="Your message" required></textarea><br/><br/>

    <input type="submit" id="formSubmitContact" value="submit" name="submit"/>
</form>

    <section class="shopKeeperContact">
        <p class="bubbleContact"><b>Contact us if you have any question!</b></p>
    </section>


    <section class="errors">
    <!--Alerte (erreur ou succès)-->
<?php if (!empty($errors)): ?>
    <div class="error">
        <?php foreach ($errors as $error) :?>
            <p><?= $error ?></p>
        <?php endforeach;?>
    </div>
<?php elseif (isset($success)): ?>
    <div class="error">
        <p><?php echo $success; ?></p>
    </div>
<?php endif; ?>
    </section>

</main>

<?php include '../includes/footer.php'; ?>