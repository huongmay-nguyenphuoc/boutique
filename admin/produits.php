
<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';
require_once '../classes/product.php';


$admin = new admin;




//var_dump($admin->allProducts());
?>



<html lang="fr">
  
  <body>

  <table>

      <thead>

      <tr>

          <th>id_order</th>
          <th>id_member</th>
          <th>amount</th>
          <th>description</th>
          <th>date_register</th>
          <th>state</th>
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
          <?php echo "id =" . $product['id_product'];?>
          <td>
              <form method='post' action='delete_product.php'>
                  <input type="hidden" value="<?= $product['id_product'] ?>" name="id">
                  <input type='submit' name='removeProduct' value='Delete product'>

              </form>
          </td>
          <?php echo "id =" . $product['id_product'];?>
          <td><a href="update_product.php?id_product=<?= $product['id_product'] ?>"> Modifier </a></td>
      </tr>
<?php } ?>

</tbody>

  </table>




  <article class="container">
            <a href="product_form.php"> Add new products </a>
        </article>
  </body>

</html>