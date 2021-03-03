<?php

require_once '../classes/user.php';

$title = "News";
$bodyname = "bodyuser";

session_start();
/*if (!isset($_SESSION['user'])) {
    header('location: connexion.php');
}
if($_SESSION['user']->getNewsletter() == 1){

}

else{
    header('location: newsletter.php');
}

*/
?>
<?php include '../includes/header_user.php'; ?>

<h1>NEWS OF THE MOMENT</h1>


<p>Lorem ipsum</p>


<?php include '../includes/footer.php'; ?>