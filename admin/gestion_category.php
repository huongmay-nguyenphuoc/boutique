<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';

$title = 'category';

if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() != 1) {
    header('location:../pages/connexion.php');
}
else {

    $admin = new admin;


    if(isset($_POST['submit'])){

        $name = htmlspecialchars($_POST['name']);

        $admin->registerCat($name);
    }
}
?>


<?php include 'includes/header.php'; ?>
<main>
    <h1>All Categories</h1>

    <form method="post" action="gestion_category.php">
        <label for="name">name</label><br>
        <input type="text" id="name" name="name" maxlength="20" placeholder="name" pattern="[a-zA-Z0-9-_.]{1,20}" title="caractères acceptés : a-zA-Z0-9-_." required="required" value="<?php if (isset($_POST['name'])) { echo htmlspecialchars($_POST['name']);} ?>"><br><br>

        <button type="submit" name="submit">send</button>
    </form>

    <table>
        <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>delete</th>


        </tr>
        </thead>
    <tbody>

        <?php foreach($admin->allCat() as $cat){


            ?>
            <tr>
                <td><?=  $cat['id_category'];?></td>
                <td><?=  $cat['name'];?></td>
                <td>
                    <form method='post' action='delete_category.php'>
                        <input type="hidden" value="<?= $cat['id_category'] ?>" name="id">
                        <input type='submit' name='removeCat' value='Delete Category'>

                    </form>
                </td>

            </tr>

        <?php } ?>
    </tbody>
    </table>

    </main>
<?php include 'includes/footer.php'; ?>