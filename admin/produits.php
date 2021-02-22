<?php

require_once '../classes/admin.php';
require_once '../classes/product.php';

if (!isset($_SESSION['user']) OR $_SESSION['user']->getStatus() != 1) {
    header('location:../pages/connexion.php');
}
else {
    $admin = new admin;
}
?>


<html lang="fr">


<?php include 'includes/header.php'; ?>

<h1>All Products</h1>
<section class="new">
    <a href="product_form.php"> <button>Add new product</button></a>
</section>

<table>

    <thead>

    <tr>

        <th>category</th>
        <th>subcategory</th>
        <th>title</th>
        <th>short description</th>
        <th>price</th>
        <th>picture</th>
        <th>stock</th>
        <th>action</th>

    </tr>

    </thead>
    <tbody>

    <?php foreach ($admin->allProducts() as $product) : ?>
        <tr>
            <td><?= $product['category'] ?></td>
            <td><?= $product['subcategory'] ?></td>
            <td><?= $product['title'] ?></td>
            <td><?= $product['shortdesc'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><img height="100px" src="../productPics/<?= $product['image'] ?>"</td>
            <td><?= $product['stock'] ?></td>

            <td>
                <a class="button" href="update_product.php?id_product=<?= $product['id_product'] ?>">Update </a>
                <form method='post' action='delete_product.php'>
                    <input type="hidden" value="<?= $product['id_product'] ?>" name="id">
                    <input type='submit' name='removeProduct' value='Delete product'>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>

</table>



<?php include 'includes/footer.php'; ?>