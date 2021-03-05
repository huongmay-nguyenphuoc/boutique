<?php
require_once('../classes/user.php');
require_once('../classes/shop.php');

$title = "About";
$bodyname = "bodyapropros";
$shop = new shop();
session_start();


?>


<?php require_once('../includes/header.php'); ?>

    <main>


        <h1>À PROPOS</h1>
        <h2>WHO ARE WE?</h2>


        <article class="apropos">



        <section class="shopKeeperAP">
            <article class="text-box-AP">
            <p>GameBursters are based in Marseille, France and best known for their expertise and fast-dispatch of video games and electronics.</p>
            <p>Prices are always competitive and finance is available on a number of items across the site making things more affordable.</p>
                <p>We delivered in Europe and only here</p><br>

            <p>We believe in loyalty and that’s why our customers are rewarded when they repeatedly shop with us and they can also Share & earn in our affiliate scheme.</p>
            <p>Don't just take our word for it see what others have to say about us below and connect with us if you have any questions.</p>
            </article>
        </section>



            <?php if ($shop->showReview()) : ?>

                <section class="bubbleAP">
                    <h3>YOUR REVIEWS ABOUT OUR SHOP</h3>
                    <table>
                        <thead>
                        <tr>
                            <th>date</th>
                            <th>Login</th>
                            <th>message</th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($shop->showReview() as $review) {

                            ?>
                            <tr>
                                <td><?= $review['date_review']; ?></td>
                                <td><?= $review['login']; ?></td>
                                <td><?= $review['message_review']; ?></td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>

                </section>
            <?php endif; ?>


        </article>
    </main>

<?php require_once('../includes/footer.php'); ?>