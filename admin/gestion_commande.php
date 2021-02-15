<?php

require_once '../classes/admin.php';
require_once '../classes/product.php';
require_once '../classes/order.php';

//session_start();


$admin = new admin;

?>

<html lang="fr">

<body>

<table>

    <thead>

    <tr>

        <th>id_order</th>
        <th>id_member</th>
        <th>amount</th>
        <th>date_register</th>
        <th>state</th>
        <th>supprimer</th>
        <th>modifier</th>


    </tr>

    </thead>
    <tbody>

    <?php foreach($admin->allOrders() as $orders){ ?>

        <tr>
            <td><?=  $orders['id_order']?></td>
            <td><?=  $orders['id_member']?></td>
            <td><?=  $orders['amount']?></td>
            <td><?=  $orders['date_register']?></td>
            <td><?=  $orders['state']?></td>
            <?php echo "id =" . $orders['id_order'];?>
            <td>
                <form method='post' action='delete_order.php'>
                    <input type="hidden" value="<?= $orders['id_order'] ?>" name="id">
                    <input type='submit' name='removeOrder' value='Delete order'>

                </form>
            </td>
            <td><a href="update_product.php?id_product= <?= $orders['id_order'] ?>"> Modifier </a></td>
        </tr>
    <?php } ?>

    </tbody>

</table>


