<?php

require_once '../classes/admin.php';

require_once '../classes/user.php';

session_start();



if(empty($_SESSION['user']->getId()) OR $_SESSION['user']->getId() != 1){

    //$historic = $_SESSION['admin']->allMembers(); //récup historique général

   /* if (isset($_POST['removeUser'])) {
        $alert = "Are you sure?";
    }

    if (isset($_POST['confirmremoveUser'])) {
        $admin->deleteUser();
    }*/


}
//else{
  //  exit();
//}

?>




<html>







<?php
$bdd = mysqli_connect("localhost", "root", "", "boutique");
$requete = "SELECT `delete`, login, email, firstname, lastname, city, zip, adress FROM users WHERE 1;";

$query = mysqli_query($bdd, $requete);


$i=0;

echo "<table>" ;

while ($result = mysqli_fetch_assoc($query))
{

    if ($i == 0)
    {

        foreach ($result as $key => $value)
        {

            echo "<th>$key</th>";

        }
        $i++;

    }

    echo "<tr>";

    foreach ($result as $key => $value)
    {
        /*echo " <tr> <form method='post' action='gestion_membres.php'>
        <input type='submit' name='removeUser' value='Delete user'>
    </form></tr>";*/
        echo "<td>$value</td>";

    }

    echo "</tr>";

}

echo "</table>";

?>

<?php
if (isset($erreur))
{
    echo $erreur;
}
?>

$photo_bdd = "";
if(!empty($_FILES['photo']['name']))
{   // debug($_FILES);
$nom_photo = $_POST['reference'] . '_' .$_FILES['photo']['name'];
$photo_bdd = RACINE_SITE . "photo/$nom_photo";
$photo_dossier = $_SERVER['DOCUMENT_ROOT'] . RACINE_SITE . "/photo/$nom_photo";
copy($_FILES['photo']['tmp_name'],$photo_dossier);
}



</html>
