<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';

$title = 'Subcategory';

if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() != 1) {
    header('location:../pages/connexion.php');
}
else {

    $admin = new admin;

    if(isset($_POST['submit'])){

        $name = htmlspecialchars($_POST['name']);

        $admin->registerSubcat($name);
    }
}
?>




    <html>

<?php include 'includes/header.php'; ?>

    <h1>All Subcategories</h1>

    <form method="post" action="gestion_subcategory.php">
        <label for="name">name</label><br>
        <input type="text" id="name" name="name" maxlength="20" placeholder="name" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required" value="<?php if (isset($_POST['name'])) { echo htmlspecialchars($_POST['name']);} ?>"><br><br>

        <button type="submit" name="submit">send</button>
    </form>

    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>delete</th>


        </tr>


        <?php foreach($admin->allSubcat() as $subcat){


            ?>
            <tr>
                <td><?=  $subcat['id_subcategory'];?></td>
                <td><?=  $subcat['name'];?></td>
                <td>
                    <form method='post' action='delete_subcategory.php'>
                        <input type="hidden" value="<?= $subcat['id_subcategory'] ?>" name="id">
                        <input type='submit' name='removeSubcat' value='Delete Subcategory'>

                    </form>
                </td>

            </tr>

        <?php } ?>
    </table>


<?php include 'includes/footer.php'; ?>