<?php
require_once('../classes/order.php');

$title = "Success";
$bodyname = "bodysuccess";

/*

if (isset($_SESSION['panier']) AND !empty($_SESSION['panier'])) {
    $_SESSION['order']->insertOrder();
    $_SESSION['order']->changeStock();
    $_SESSION['order']->deleteCart();
}*/
?>


<?php include '../includes/header.php'; ?>


    <article class="success">



        <section class="shopKeeperOk">
            <p class="bubbleOk"><b>CONGRATS!!!! It worked!</b></p>
        </section>

        <section class="linksuccess">
            <a href="profil.php"><b><span> <img src="../photo/style/icons8-hand-right-50.png" width="40px"/>  </span>Go back to your Profile to see your Order<span> <img src="../photo/style/icons8-hand-left-50.png" width="40px"/> </span></b></a><br>
            <a href="categorie.php"><b><span> <img src="../photo/style/icons8-hand-right-50.png" width="40px"/>  </span>Continue to shop<span> <img src="../photo/style/icons8-hand-left-50.png" width="40px"/>  </span></b></a>

        </section>
    </article>

<?php include '../includes/footer.php'; ?>