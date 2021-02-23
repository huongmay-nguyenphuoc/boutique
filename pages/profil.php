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
<main class="profil">
<article class="profiluser">

    <section class="order">
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

    </section>


<section class="user">
        <h1><em>Profil @<?php echo $_SESSION['user']->getLogin(); ?></em></h1>


    <?php if ($_SESSION['user']->getAvatar() != null) : ?>
        <img height="200px" src="../avatars/<?= $_SESSION['user']->getAvatar() ?>">
    <?php endif; ?>
</section>

    <section class="userinfos">
        <?php
        echo "Login:  " .$_SESSION['user']->getLogin(). "<br><br>";
        echo "Email:  " .$_SESSION['user']->getEmail(). "<br><br>";;
        echo "Firstname:  " .$_SESSION['user']->getFirstname(). "<br><br>";;
        echo "Lastname:  " .$_SESSION['user']->getLastname(). "<br><br>";;
        echo "City:  " .$_SESSION['user']->getCity(). "<br><br>";;
        echo "ZIP:  " .$_SESSION['user']->getZip(). "<br><br>";;
        echo "Adress:  " .$_SESSION['user']->getAdress(). "<br><br>";;


        ?>
    </section>

</article>

<article class="links">
    <section class="orderlink">
        <a href="shopcart.php"><button>Shopcart</button></a>
        <img src="../photo/style/Xbox_button_B.svg.png" width="50px"/>
    </section>

    <section class="imglink">

    </section>

    <section class="updatelink">
        <img src="../photo/style/Xbox_button_A.svg.png" width="50px"/>
        <a href="update.php"><button>Update your Profile</button></a>
    </section>

</article>

</main>