<?php
session_start();
var_dump($_SESSION);
?>
<body>
<main>
    <div id="paypal-payment-button">

    </div>
    <script src="https://www.paypal.com/sdk/js?client-id=AbaU37iGj_7MwcYbXObtbmBPd5xlMR1hn4F0UYIGBQ-NIPgKuxWUsP2ikYN8RVvLeewchmffOs3OdpX9&disable-funding=credit,card"></script>
    <script src="index.js"></script>
    <script type="text/javascript">
        var my_var = <?php echo json_encode($_SESSION['price']); ?>;
    </script>

</main>
</body>
