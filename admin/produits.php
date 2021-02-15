
<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';
require_once '../classes/product.php';



session_start();

$admin = new admin;


//var_dump($admin->allProducts());
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

          <th>supprimer</th>
          <th>modifier</th>

      </tr>

      </thead>
<tbody>

          <?php foreach($admin->allProducts() as $product){ ?>

      <tr>
          <td><?=  $product['category']?></td>
          <td><?=  $product['subcat']?></td>
          <td><?=  $product['title']?></td>
          <td><?=  $product['description']?></td>
          <td><?=  $product['shortdesc']?></td>
          <td><?=  $product['price']?></td>
          <td><?=  $product['stock']?></td>

          <td class="ajax-delete" data-id="<?= $product['id_product'] ?>"
              data-name="product_id"><i
                      class="fas fa-trash"></i></td>
          <td>

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