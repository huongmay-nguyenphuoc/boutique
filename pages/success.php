<?php
require_once('../classes/order.php');

if (isset($_SESSION['panier']) AND !empty($_SESSION['panier'])) {
    $_SESSION['order']->insertOrder();
    $_SESSION['order']->changeStock();
    $_SESSION['order']->deleteCart();
}
?>


<?php include '../includes/header.php'; ?>


    <article class="success">

        <section class="message">
            <p><b>CONGRATS!!!</b></p>
            <p><b>Success!</b></p>
            <p><b>Your order have been registered.</b></p>
        </section>

        <section class="gif">
            <img src="https://media.giphy.com/media/kzwzTIbi7sBm8/giphy.gif" height="400px"/>
        </section>

        <section class="linksuccess">
            <a href="profil.php"><b><span> < </span>Go back to your Profile to see your Order<span> > </span></b></a><br>
            <a href="categorie.php"><b><span> < </span>Continue to shop<span> > </span></b></a>

        </section>
    </article>

<?php include '../includes/footer.php'; ?>