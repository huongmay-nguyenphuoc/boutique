
<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';
require_once '../classes/product.php';



session_start();
$user = new user;
$admin = new admin;
$product = new product;

?>



<html lang="fr">
  
  <body>

  <table>

      <thead>

      <tr>

          <th>category</th>
          <th>subcategory</th>
          <th>title</th>
          <th>description</th>
          <th>shortdesc</th>
          <th>price</th>
          <th>stock</th>
          <th>quantity</th>
          <th>picture</th>
          <th>supprimer</th>
          <th>modifier</th>

      </tr>

      </thead>
<tbody>

          <?php foreach($admin->allProducts() as $product){ ?>

      <tr>
          <td><?=  $product['id_product']?></td>
          <td><?=  $product['category']?></td>
          <td><?=  $product['subcat']?></td>
          <td><?=  $product['title']?></td>
          <td><?=  $product['description']?></td>
          <td><?=  $product['shortdesc']?></td>
          <td><?=  $product['price']?></td>
          <td><?=  $product['stock']?></td>
          <td><?=  $product['quantity']?></td>
          <td><?=  $product['picture']?></td>
          <td><a href="delete_product.php?id_products= <?= $product['id_product'] ?>"> Supprimer </a></td>
          <td><a href="update_product.php"> Modifier </a></td>
      </tr>
<?php } ?>

</tbody>

  </table>





  <article class="container">
            <a href="product_form.php"> Add new products </a>
        </article>
  </body>

</html>