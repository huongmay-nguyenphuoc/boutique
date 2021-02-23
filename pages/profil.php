<?php

require_once '../classes/user.php';
require_once '../classes/order.php';


if (!isset($_SESSION['user'])) {
    header('location: connexion.php');
}
$commandes = $_SESSION['user']->ordersUser();
if (isset($_POST['show'])) {
    $show[$_POST["value"]] = true;
}
?>


<?php include '../includes/header_user.php'; ?>

<main class="center mainSpace">

    <article class="container">
        <h1><em>Profil @<?php echo $_SESSION['user']->getLogin(); ?></em></h1>
        <a href="update.php">
            <button>Update your Profile</button>
        </a>
    </article>


    <?php if ($_SESSION['user']->getAvatar() != null) : ?>
        <p>AVATAR</p>
        <img height="100px" src="../avatars/<?= $_SESSION['user']->getAvatar() ?>">
    <?php endif; ?>


    <ul>
        <?php $i = 0; ?>
        <?php foreach ($commandes as $order) : ?>
            <li>
                <ul>

                    <li>
                        <ul>
                            <li>Date: <?= $order['date_register'] ?></li>
                            <li>Total: <?= $order['amount'] ?></li>
                            <li>State: <?= $order['state'] ?></li>
                            <li>
                                <form method="post">
                                    <input type="hidden" name="value" value="<?= $i ?>">
                                    <input type="submit" name="show" value="show details">
                                </form>
                            </li>
                        </ul>
                    <li>

                    <li>
                        <?php if (isset($show[$i])) : ?>
                            <?php $j = 1; ?>
                            <ul>
                                <?php foreach ($_SESSION['user']->ordersUserDetails($order['id_order']) as $detail) : ?>
                                    <li>
                                        <ul>
                                            <li><?= $j ?> / <?= $detail['title'] ?></li>
                                            <li>price: <?= $detail['price'] ?> €</li>
                                            <li>quantity: <?= $detail['quantity'] ?></li>
                                            <?php $j++; ?>
                                        </ul>
                                    </li><br>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>

                </ul>
                <?php $i++; ?>
            </li><br><br>
        <?php endforeach; ?>
    </ul>

</main>

