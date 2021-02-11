<?php
require_once('../classes/order.php');


var_dump($_SESSION);
if (isset($_SESSION['panier']) AND !empty($_SESSION['panier'])) {
    $_SESSION['order']->insertOrder();
    $_SESSION['order']->changeStock();
    $_SESSION['order']->deleteCart();
}
var_dump($_SESSION);
?>

<p>Success!</p>
<p>Your order have been registered.</p>
