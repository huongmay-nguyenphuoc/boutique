<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';
require_once '../classes/product.php';

session_start();
$admin = new admin;

//var_dump($admin->allMembers());
?>




<html>


<table>
    <tr>
        <th>id_subcat</th>
        <th>name</th>
        <th>modifier</th>
        <th>supprimer</th>
    </tr>


    <?php foreach($admin->allSubcat() as $subcat){


        ?>
        <tr>
            <td><?=  $subcat['id_subcat'];?></td>
            <td><?=  $subcat['name'];?></td>

            <td>
                <form method='post' action='delete_category.php'>
                    <input type="hidden" value="<?= $subcat['id_subcat'] ?>" name="id">
                    <input type='submit' name='removeSubcat' value='Delete subcat'>

                </form>
            </td>

            <td><a href="update_subcat.php?id_category= <?= $subcat['id_subcat'] ?>"> Modifier </a></td>

        </tr>
        <?php //var_dump($_POST);
        //var_dump($user);?>
    <?php } ?>
</table>



</html>