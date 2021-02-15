<?php

require_once '../classes/user.php';
require_once '../classes/order.php';

session_start();

if (isset($_SESSION['user'])) {


}


else{

    header('location: connexion.php');

}
?>


<html lang="en">

<main class="center mainSpace">

        <article class="container">
            <h3><em>Profil @<?php echo $_SESSION['user']->getLogin(); ?></em></h3>
            <a class="waves-effect waves-light white black-text btn-small" href="update.php">Modifier vos
                identifiants</a>
        </article>

    <html lang="fr">

    <body>

    <table>

        <thead>

        <tr>
            <th>date_register</th>
            <th>id_order</th>
            <th>id_order_details</th>
            <th>amount</th>
            <th>quantity</th>
            <th>price</th>
            <th>state</th>


        </tr>

        </thead>
        <tbody>

        <?php foreach($_SESSION['user']->ordersUser() as $orders){ ?>

            <tr>
                <td><?=  $orders['date_register']?></td>
                <td><?=  $orders['id_order']?></td>
                <td><?=  $orders['id_order_details']?></td>
                <td><?=  $orders['amount']?></td>
                <td><?=  $orders['quantity']?></td>
                <td><?=  $orders['price']?></td>
                <td><?=  $orders['state']?></td>


            </tr>
        <?php } ?>

        </tbody>

    </table>

    </body>
    </html>




</main>

</html>