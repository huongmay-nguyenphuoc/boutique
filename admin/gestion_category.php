<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';
require_once '../classes/product.php';


$admin = new admin;

//var_dump($admin->allMembers());

if(isset($_POST['submit'])){

    $admin = new admin();


    if (!empty($_POST)) {

        $name = htmlspecialchars($_POST['name']);

    }


    if(empty($errors)){

        $admin->addCat($name);
        $success = "Category created. <a href='gestion_category.php'>Log in</a>";

    }

}




addCat($name)
?>




<html>

<h1> Products form </h1>

<form method="post" enctype="multipart/form-data" action="product_form.php">
    <label for="name">name</label><br>
    <input type="text" id="name" name="name" placeholder="name" > <br><br>

    <button class="btn waves-effect waves-light black" type="submit" name="submit">
        <i class="material-icons right">send</i>
    </button>
</form>

<table>
    <tr>
        <th>id_category</th>
        <th>name</th>
        <th>modifier</th>
        <th>supprimer</th>
    </tr>


    <?php foreach($admin->allCat() as $cat){


        ?>
        <tr>
            <td><?=  $cat['id_category'];?></td>
            <td><?=  $cat['name'];?></td>

            <td>
                <form method='post' action='delete_category.php'>
                    <input type="hidden" value="<?= $cat['id_category'] ?>" name="id">
                    <input type='submit' name='removeCat' value='Delete cat'>

                </form>
            </td>

            <td><a href="update_cat.php?id_category= <?= $cat['id_category'] ?>"> Modifier </a></td>

        </tr>
        <?php //var_dump($_POST);
        //var_dump($user);?>
    <?php } ?>
</table>



</html>
