<?php
require_once('../classes/user.php');
require_once('../classes/order.php');



//var_dump($_SESSION);
$title = "Success";
$bodyname = "bodysuccess";

if (!isset($_SESSION['user'])) {
    header('location: connexion.php');
}


if (isset($_SESSION['panier']) and !empty($_SESSION['panier'])
    and isset($_SESSION['order']) and !empty($_SESSION['order'])) {
    ($_SESSION['order']->insertOrder());
    $_SESSION['order']->changeStock();
    $_SESSION['order']->deleteCart();
}


if(isset($_SESSION['user'])) {

    if (isset($_POST['submit'])) {

        $id_member = $_SESSION['user']->getId();
        $message_review = htmlspecialchars($_POST['message']);

        if (!empty($message_review)) {
            //date_default_timezone_get('Europe/Paris');
            $date_review = date("Y-m-d");


            if (empty($errors)) {
                $_SESSION['user']->addReview($message_review, $id_member, $date_review);
                $success = "thank for review";
            }

        }

    }
}





?>


<?php include '../includes/header.php'; ?>

    <main>

        <section class="congrats">

        <article class="success">


            <section class="shopKeeperOk">
                <p class="bubbleOk"><b>CONGRATS! DON'T FORGET TO GIVE US A REVIEW</b></p>
            </section>

            <section class="formreview">

                <form method="POST" action="success.php" class="review">
                    <fieldset>
                        <legend><b>DON'T FORGET TO LEAVE A REVIEW</b></legend>
                    <label for="login">LOGIN</label><br>
                    <input placeholder="login" id="login" type="text" name="login" maxlength="20"  value="<?php echo $_SESSION['user']->getLogin(); ?>"><br><br>

                    <label for="message">Message</label><br>
                    <textarea name="message" cols="15" rows="10" placeholder="Your message" required></textarea><br/><br/>


                    <input type="submit" value="submit" name="submit"/>
                    </fieldset>
                </form>

            </section>
        </article>

        <article class="addreview">

            <section class="linksuccess">
                <a href="profil.php"><b><span> <img src="../photo/style/icons8-hand-right-50.png"
                                                    width="40px"/>  </span>Go back to your Profile to see your
                        Order<span> <img src="../photo/style/icons8-hand-left-50.png" width="40px"/> </span></b></a><br>
                <a href="categorie.php"><b><span> <img src="../photo/style/icons8-hand-right-50.png"
                                                       width="40px"/>  </span>Continue to shop<span> <img
                                    src="../photo/style/icons8-hand-left-50.png" width="40px"/>  </span></b></a>

            </section>


            <section class="errors">
                <!--Alerte (erreur ou succès)-->
                <?php if (!empty($errors)): ?>
                    <div class="error">
                        <?php foreach ($errors as $error) :?>
                            <p><?= $error ?></p>
                        <?php endforeach;?>
                    </div>
                <?php elseif (isset($success)): ?>
                    <div class="error">
                        <p><?php echo $success; ?></p>
                    </div>
                <?php endif; ?>
            </section>
        </article>
        </section>

    </main>

<?php include '../includes/footer.php'; ?>