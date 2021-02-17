<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';


$admin = new admin;

//var_dump($admin->allMembers());
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


    ?>
    <tr>
        <td><?=  $user['login'];?></td>
        <td><?=  $user['lastname'];?></td>
        <td><?=  $user['firstname'];?></td>
        <td><?=  $user['email']; ?></td>
        <td><?=  $user['city'];?></td>
        <td><?=  $user['zip'];?></td>
        <td><?=  $user['adress'];?></td>
        <td>
            <form method='post' action='delete_member.php'>
                <input type="hidden" value="<?= $user['id_member'] ?>" name="id">
                <input type='submit' name='removeUser' value='Delete user'>

            </form>
        </td>

    </tr>
<?php //var_dump($_POST);
        //var_dump($user);?>
    <?php } ?>
</table>



</html>
