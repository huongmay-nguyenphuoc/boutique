<?php

require_once '../classes/user.php';
require_once '../classes/order.php';

$title = "Profile";
$bodyname = "bodyuser";

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
                    <img id="avatar" height="200px" src="../avatars/<?= $_SESSION['user']->getAvatar() ?>">
                <?php endif; ?>
            </section>

            <section class="userinfos">
                <?php
                echo "Login:  " . $_SESSION['user']->getLogin() . "<br><br>";
                echo "Email:  " . $_SESSION['user']->getEmail() . "<br><br>";
                echo "Firstname:  " . $_SESSION['user']->getFirstname() . "<br><br>";
                echo "Lastname:  " . $_SESSION['user']->getLastname() . "<br><br>";
                echo "City:  " . $_SESSION['user']->getCity() . "<br><br>";
                echo "ZIP:  " . $_SESSION['user']->getZip() . "<br><br>";
                echo "Adress:  " . $_SESSION['user']->getAdress() . "<br><br>";
                echo "Newsletter:  " . $_SESSION['user']->getNewsletter() . "<br><br>";


                ?>
            </section>


        </article>

        <section class="button_admin">
            <?php if ($_SESSION['user']->getStatus() == 1) {
                echo "<a href='../admin/profil_admin.php'><button>BUTTON ADMIN</button></a>";
            } ?>
        </section>

        <article class="links">
            <section class="persolink">

                <div class="orderlink">
                    <a href="newsletter.php">
                        <span><b>Newsletter</b></span>
                        <img src="../photo/style/Xbox_button_B.svg.png" width="40px"/>
                    </a>
                </div>

                <div class="joystick">
                    <a href="deconnexion.php">
                        <p>Déconnexion</p>
                        <img src="../photo/style/arrow.png" width="80px"/>
                    </a>
                </div>

                <div class="updatelink">
                    <a href="update.php">
                        <img src="../photo/style/Xbox_button_A.svg.png" width="40px"/>
                        <span><b>Update Profile</b></span>
                    </a>
                </div>
            </section>

        </article>

    </main>


<?php include '../includes/footer.php'; ?>