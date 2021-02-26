<?php
session_start();
//var_dump($_SESSION);

if (!isset($_SESSION['user'])) {
    header('location: connexion.php');
}
$title = 'pay';
$bodyname = 'bodyPay';
?>



<?php require_once('../includes/header.php'); ?>
<main id="mainPay">

    <section id="paypal-payment-button">

    </section>
    <section>
        <a href="shopcart.php">I'm not ready to pay yet...</a>
    </section>

</main>
<script src="https://www.paypal.com/sdk/js?client-id=AbaU37iGj_7MwcYbXObtbmBPd5xlMR1hn4F0UYIGBQ-NIPgKuxWUsP2ikYN8RVvLeewchmffOs3OdpX9&disable-funding=credit,card"></script>
<script src="index.js"></script>
<script type="text/javascript">
    var my_var = <?php echo json_encode($_SESSION['price']); ?>;
</script>
