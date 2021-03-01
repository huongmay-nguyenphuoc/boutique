<?php
require_once '../classes/user.php';

session_start();

$title = "Contact";
$bodyname = "bodycontact";


if(isset($_SESSION['user'])) {

    if (isset($_POST['submit'])) {
        $id = htmlspecialchars($_POST['id_member']);
        $message = htmlspecialchars($_POST['message']);

        if (!empty($message)) {
            //date_default_timezone_get('Europe/Paris');
            $date = date("Y-m-d");
        }


        if (empty($errors)) {
            $_SESSION['user']->registerEmail($id, $message);
            $success = "bravo";

        }

    }
var_dump($_SESSION['user']);
    var_dump($_POST);
}



?>

<?php //include '../includes/header.php'; ?>
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


<h2>Contact us for more questions/answers !</h2>
<form method="POST" action="contact.php">
    <label for="id-member">ID</label><br>
    <input placeholder="id_member" id="id_member" type="text" name="id_member" maxlength="20"
           value="<?php echo $_SESSION['user']->getId(); ?>"><br><br>


    <label for="message">Message</label><br>
    <textarea name="message" cols="30" rows="15" placeholder="Your message">Your message</textarea><br/><br/>

    <input type="submit" value="submit" name="submit"/>
</form>


<?php //include '../includes/footer.php'; ?>