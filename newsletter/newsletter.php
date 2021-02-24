<?php
$reqnewsletter = $bdd->prepare("SELECT * FROM newsletter WHERE ip = ?");
$reqnewsletter->execute(array($_SERVER['REMOTE_ADDR']));
$newsletterexist = $reqnewsletter->rowCount();
if(isset($_POST['newsletterform'])){
    if(isset($_POST['newsletter'])){
        if(!empty($_POST['newsletter'])){
            $newsletter = htmlspecialchars($_POST['newsletter']);
            if(filter_var($newsletter, FILTER_VALIDATE_EMAIL)) {
                $reqip = $bdd->prepare("SELECT * FROM newsletter WHERE ip = ?");
                $reqip->execute(array($_SERVER['REMOTE_ADDR']));
  $ipexist = $reqip->rowCount();
  if($ipexist == 0) {
                       $reqmail = $bdd->prepare("SELECT * FROM newsletter WHERE email = ?");
      $reqmail->execute(array($newsletter));
   $mailexist = $reqmail->rowCount();
     if($mailexist == 0){
                               $sql = $bdd->prepare('INSERT INTO newsletter(email,ip,dates) VALUES (?,?,NOW())');
                  $sql->execute(array($newsletter,$_SERVER['REMOTE_ADDR']));
        header("Location: newsletter.php");
    } else {
                             $erreur = "Vous êtes déjà inscrit à la Newsletter..";
    }
  } else {

      $erreur = "Vous êtes déjà inscrit à la Newsletter..";
   }
         } else {
                $erreur = "Vous devez indiquer une adresse e-mail..";
            }
        } else {
            $erreur = "Vous devez remplir tout les champs vides..";
        }
    }
}
if(isset($_GET['deinscription'])){
    if(!empty($_GET['deinscription'])){
        $deinscription = htmlspecialchars($_GET['deinscription']);
        $reqip = $bdd->prepare("SELECT * FROM newsletter WHERE ip = ?");
        $reqip->execute(array($_SERVER['REMOTE_ADDR']));
     $ipexist = $reqip->rowCount();
    if($ipexist == 1){
        $info = $bdd->prepare('SELECT * FROM newsletter WHERE id = ?');
         $info->execute(array($deinscription));
         $info = $info->fetch();
         if($info['ip'] == $_SERVER['REMOTE_ADDR']){
             $sql = $bdd->prepare('DELETE FROM newsletter WHERE id = ?');
             $sql->execute(array($deinscription));
             header("Location: newsletter.php");
         } else {
             $erreur = "Cette inscription ne vous appartient pas..";
         }
      } else {
            $erreur = "Vous n'êtes pas inscrit à la Newsletter..";
        }
   } else {
        $erreur = "L' ID de l'inscription n'est pas présente..";
    }
}
require('faq.view.php');
?>