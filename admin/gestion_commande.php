<?php

require_once '../classes/admin.php';
require_once '../classes/product.php';
require_once '../classes/order.php';
if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() != 1) {
    header('location:../pages/connexion.php');
}

else {

    $admin = new admin;


    if (isset($_POST['submit'])) {


        $state = htmlspecialchars($_POST['state']);
        $id_order = htmlspecialchars($_POST['id']);

        $admin->updateState($state, $id_order);
        $success = "State has been udpated<a href='gestion_commande.php'>All orders</a>";


    }
}
?>

<html lang="fr">

<?php include 'includes/header.php'; ?>

<h1>All Orders</h1>

<table>

    <thead>

    <tr>

        <th>id_order</th>
        <th>id_member</th>
        <th>amount</th>
        <th>date_register</th>
        <th>supprimer</th>
        <th>state</th>



    </tr>

    </thead>
    <tbody>

    <?php foreach($admin->allOrders() as $orders){ ?>

        <tr>
            <td><?=  $orders['id_order']?></td>
            <td><?=  $orders['id_member']?></td>
            <td><?=  $orders['amount']?></td>
            <td><?=  $orders['date_register']?></td>
            <?php //echo "id =" . $orders['id_order'];?>
            <td>
                <form method='post' action='delete_order.php'>
                    <input type="hidden" value="<?= $orders['id_order'] ?>" name="id">
                    <input type='submit' name='removeOrder' value='Delete order'>
                </form>
            </td>

            <td>
                <form method='post' action='gestion_commande.php'>
                    <input type="hidden" value="<?= $orders['id_order'] ?>" name="id">
                    <label for="state">state</label><br>
                    <select name="state" id="state" required>
                        <option selected value="<?= $orders['state'] ?>"> <?= $orders['state'] ?> </option>
                        <option value='being processed'> being processed </option>
                        <option value='send'> send </option>
                        <option value='delivered'> delivered </option>
                    </select><br><br>
                    <button class= type="submit" name="submit">
                        <i class="material-icons right">send</i>
                    </button>
                </form>
            </td>

        </tr>
    <?php } ?>

    </tbody>

</table>

</html>


