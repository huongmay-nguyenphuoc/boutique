<?php
$title = "Contact";
$bodyname = "bodycontact";

if(isset($_POST['submit'])){
    $login = htmlspecialchars($_POST['login']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
}



?>

<?php include '../includes/header.php'; ?>

<h2>Contact us for more questions/answers !</h2>
<form method="POST" action="contact.php">
    <input type="text" name="login" placeholder="Your login" value="<?php if(isset($_POST['login'])) { echo $_POST['login']; } ?>" /><br/><br/>
    <input type="email" name="mail" placeholder="Your email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" /><br/><br/>
    <textarea name="message" cols="30" rows="15" placeholder="Your message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br/><br/>
    <input type="submit" value="Submit !" name="mailform"/>
</form>

<?php include '../includes/footer.php'; ?>