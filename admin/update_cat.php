<?php

require_once '../classes/admin.php';
require_once '../classes/product.php';

if(isset($_POST['submit'])){
    $admin = new admin;

    $name = htmlspecialchars($_POST['name']);

    if(empty($errors)){

        $admin->updateCat($name);
        $success = "Account has been udpated<a href='boutique.php'>Continue shopping</a>";


    }



}



?>







<html>

<main>

    <!--Alerte (erreur ou succès)-->
    <?php if (!empty($errors)): ?>
        <div>
            <?php foreach ($errors as $error) {
                echo '<p class="red-text">' . $error . '</p>';
            }
            ?>
        </div>
    <?php elseif (isset($success)): ?>
        <div>
            <p class="white-text"><?php echo $success; ?></p>
        </div>
    <?php endif; ?>


    <h1>Update category</h1>

<form action="update_cat.php" method="post" enctype="multipart/form-data">

    <label for="name">Category name</label><br>
    <input placeholder="name" id="name" type="text" name="name" maxlength="20" ><br><br>

    <button class="btn waves-effect waves-light black" type="submit" name="submit">
        <i class="material-icons right">send</i>
    </button>
</form>


</main>
</html>