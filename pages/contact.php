<?php
require_once '../classes/user.php';

$title = "Contact";
$bodyname = "bodycontact";
/*
$mail =mail('alicia.cordial@laplateforme.io', 'Salut', 'je fais un test', 'From: alicia.cordial@gmail.com');

if($mail){
    echo "merci!";
}

else{
    echo "Erreur";
}*/

if(isset($_SESSION['user'])){

if(isset($_POST['submit'])) {
    $login = htmlspecialchars($_POST['login']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);


    var_dump($_POST['submit']);
}

    $msg_erreur = "Erreur. Les champs suivants doivent être obligatoirement
remplis :<br/><br/>";
    $msg_ok = "Votre demande a bien été prise en compte.";
    $message = $msg_erreur;
    define('MAIL_DESTINATAIRE', 'alicia.laplateforme@gmail.com'); // remplacer par votre email
    define('MAIL_SUJET', 'Message du formulaire de example.com');

// vérification des champs
    if (empty($_POST['login']))
        $message .= "Votre login<br/>";
    if (empty($_POST['email']))
        $message .= "Votre email<br/>";
    if (empty($_POST['message']))
        $message .= "Votre message<br/>";

// si un champ est vide, on affiche le message d'erreur et on stoppe le script
    if (strlen($message) > strlen($msg_erreur)) {
        echo $message;
        die();
    }


//Préparation de l'entête du mail:
    $mail_entete = "MIME-Version: 1.0\r\n";
    $mail_entete .= "From: {$_POST['nom']} "
        . "<{$_POST['email']}>\r\n";
    $mail_entete .= 'Reply-To: ' . $_POST['email'] . "\r\n";
    $mail_entete .= 'Content-Type: text/plain; charset="iso-8859-1"';
    $mail_entete .= "\r\nContent-Transfer-Encoding: 8bit\r\n";
    $mail_entete .= 'X-Mailer:PHP/' . phpversion() . "\r\n";

// préparation du corps du mail
    $mail_corps = "Message de : $login\n";
    $mail_corps .= "email : $email\n";
    $mail_corps .= $message;

// envoi du mail
    if (mail(MAIL_DESTINATAIRE, MAIL_SUJET, $mail_corps, $mail_entete)) {
        //Le mail est bien expédié
        echo $msg_ok;
    } else {
        //Le mail n'a pas été expédié
        echo "Une erreur est survenue lors de l'envoi du formulaire par email";
    }


}




?>

<?php //include '../includes/header.php'; ?>

<h2>Contact us for more questions/answers !</h2>
<form method="POST" action="contact.php">
    <input type="text" name="login" placeholder="Your login" value="<?php if(isset($_POST['login'])) { echo $_POST['login']; } ?>" /><br/><br/>
    <input type="email" name="mail" placeholder="Your email" value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>" /><br/><br/>
    <textarea name="message" cols="30" rows="15" placeholder="Your message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea><br/><br/>
    <input type="submit" value="submit" name="mailform"/>
</form>

<?php //include '../includes/footer.php'; ?>