<?php

require_once '../classes/admin.php';
require_once '../classes/product.php';


$admin = new admin;

?>


<html lang="fr">

<body>

<table>

    <thead>

    <tr>

        <th>category</th>
        <th>subcategory</th>
        <th>title</th>
        <th>short description</th>
        <th>price</th>
        <th>image</th>
        <th>stock</th>
        <th>modifier</th>

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
            <td><a href="update_product.php?id_product=<?= $product['id_product'] ?>"> Modifier </a></td>
            <td>
                <form method='post' action='delete_product.php'>
                    <input type="hidden" value="<?= $product['id_product'] ?>" name="id">
                    <input type='submit' name='removeProduct' value='Delete product'>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>

    </tbody>

</table>


<article class="container">
    <a href="product_form.php"> Add new product</a>
</article>
</body>

</html>