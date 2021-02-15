<?php

if(isset($_POST['del_product'])){
$producttodelete = new Product;
$producttodelete->remove($_POST['product_id']);
header('Location: produits.php');
}