<?php

require_once '../classes/user.php';
require_once '../classes/order.php';


if (!isset($_SESSION['user'])) {
    header('location: connexion.php');
}

?>


<?php include '../includes/header_user.php'; ?>

<main class="center mainSpace">

    <article class="container">
        <h1><em>Profil @<?php echo $_SESSION['user']->getLogin(); ?></em></h1>
        <a href="update.php"><button>Update your Profile</button></a>
    </article>


    <?php if ($_SESSION['user']->getAvatar() != null) : ?>
        <p>AVATAR</p>
        <img height="100px" src="../avatars/<?= $_SESSION['user']->getAvatar() ?>">
    <?php endif; ?>
    <table>
        <thead>

        </thead>
        <tbody>
        <?php foreach ($_SESSION['user']->ordersUser() as $orders): ?>
            <tr>
                <th>Commande</th>
            </tr>
            <tr>
                <th>date_register</th>
                <th>total</th>
                <th>state</th>

            </tr>
            <tr>
                <td><?= $orders['date_register'] ?></td>
                <td><?= $orders['amount'] ?></td>
                <td><?= $orders['state'] ?></td>
            </tr>

            <tr>
                <th>Detail</th>
            </tr>

            <?php foreach ($_SESSION['user']->ordersUserDetails($orders['id_order']) as $details) : ?>

                <tr>
                    <th>title</th>
                    <th>price</th>
                    <th>quantity</th>
                </tr>

                <tr>
                    <td><?= $details['title'] ?></td>
                    <td><?= $details['price'] ?></td>
                    <td><?= $details['quantity'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
        </tbody>
    </table>

    </body>
    </html>


</main>

</html>