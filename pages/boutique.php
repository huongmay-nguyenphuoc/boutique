<?php
require_once('../classes/shop.php');
$error = '';
$cat = $_GET['cat'];
$subcat = $_GET['subcat'];

$shop = new shop;
$products = $shop->selectProducts($cat, $subcat);

if (empty($products)) {
    $error = "Something happened";
}
?>

<?php if (!empty($error)): ?>
<div>
    <p><?= $error ?></p>
    <a href="categorie.php">Back</a>
</div>


<?php else : ?>
    <?php foreach ($products as $product) : ?>
        <ul>
            <li>
                <ul>
                    <li><?= $product['title'] ?></li>
                    <li><?= $product['shortdesc'] ?></li>
                    <li><a href="fiche_produit.php?id=<?= $product['id_product'] ?>">voir plus</a></li>
                </ul>
            </li>
        </ul>
    <?php endforeach; ?>
<?php endif; ?>
