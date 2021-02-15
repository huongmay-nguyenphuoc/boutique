<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';

session_start();


$admin = new admin;
$user = new user;

?>




<html>


<table>
    <tr>
        <th>login</th>
        <th>lastname</th>
        <th>firstname</th>
        <th>email</th>
        <th>city</th>
        <th>zip</th>
        <th>adress</th>
        <th>supprimer</th>


    </tr>


    <?php foreach($admin->allMembers() as $user){

    }
    ?>
    <tr>
        <td><?=  $user['id'];?></td>
        <td><?=  $user['lastname'];?></td>
        <td><?=  $user['firstname'];?></td>
        <td><?=   $user['email']; ?></td>
        <td><?=  $user['city'];?></td>
        <td><?=  $user['zip'];?></td>
        <td><?=  $user['adress'];?></td>
        <td><?= $user['id'] == $_SESSION['id'] ? 'data-phrase-error="Impossible de supprimer ce compte !"' : '' ?>
                data-can-delete="<?= $user['id'] != $_SESSION['id'] ? 'yes' : 'no' ?>"> </td>
    </tr>


</table>



</html>
