<?php

require_once '../classes/user.php';
require_once '../classes/order.php';

$title = "Profile";
$bodyname = "bodyuser";

if (!isset($_SESSION['user'])) {
    header('location: connexion.php');
}
$commandes = $_SESSION['user']->ordersUser();
//var_dump($commandes);
if (isset($_POST['show'])) {
    $show[$_POST["value"]] = true;
}
?>


<?php include '../includes/header_user.php'; ?>
    <main class="profil">
        <article class="profiluser">

            <section class="order">
                <?php if (empty($commandes)) : ?>
                    <div>
                        <p>No orders yet.</p>
                    </div>
                <?php elseif (!empty($commandes)) : ?>
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
                <?php endif; ?>
            </section>


            <section class="user">
                <h1><em>Profil @<?php echo $_SESSION['user']->getLogin(); ?></em></h1>


                <?php if ($_SESSION['user']->getAvatar() != null) : ?>
                    <div id="containerPeach">
                        <div id="divAvatar">
                            <img id="avatarHole" width="200px" src="../photo/style/peach1.png">
                            <div id="avatar">
                                <img height="80px" src="../avatars/<?= $_SESSION['user']->getAvatar() ?>">
                            </div>
                        </div>
                        <div>
                            <img width=" 200px" src="../photo/style/peach2.png">
                        </div>
                    </div>
                <?php endif; ?>>
            </section>

            <section class="userinfos">
                <p><span>Login:</span> <span><?= $_SESSION['user']->getLogin() ?> </span></p>
                <p><span>Email:</span> <span><?= $_SESSION['user']->getEmail() ?></span></p>
                <p><span>Firstname:</span> <span><?= $_SESSION['user']->getFirstname() ?> </span></p>
                <p><span>Lastname:</span> <span><?= $_SESSION['user']->getLastname() ?> </span></p>
                <p><span>City:</span> <span><?= $_SESSION['user']->getCity() ?> </span></p>
                <p><span>ZIP:</span> <span><?= $_SESSION['user']->getZip() ?> </span></p>
                <p><span>Adress:</span> <span><?= $_SESSION['user']->getAdress() ?> </span></p>
                <p><span>Newsletter:</span> <span><?= $_SESSION['user']->getNewsletter() ?> </span></p>
            </section>
        </article>
        <article class="profiluser2">
            <div>
            <section class="button_admin">
                <?php if ($_SESSION['user']->getStatus() == 1) {
                    echo "<a href='../admin/profil_admin.php'><button>ADMIN TOOLS</button></a>";
                } ?>
            </section>

            <section class="button_logout">
                <a href='deconnexion.php'>
                    <button>LOG OUT</button>
                </a>

            </section>
            </div>

            <article class="links">
                <section class="persolink">

                    <div class="orderlink">
                        <a href="newsletter.php">
                            <span><b>Newsletter</b></span>
                            <img src="../photo/style/Xbox_button_B.svg.png" width="40px"/>
                        </a>
                    </div>

                    <div class="joystick">
                        <a class="joystick2" href="shopcart.php">
                            <img src="../photo/style/arrow.png" width="80px"/>
                            <p>Cart</p>
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
        </article>

    </main>


<?php include '../includes/footer.php'; ?>