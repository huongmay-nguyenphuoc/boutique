
$user = new user();
$user->connect('may');
var_dump($user);
$products = $user->cartHistoric();
var_dump($user->cartHistoricdetails(26));

/*Traitement bouton description*/
//if (isset($_POST['show'])) {
  //  $show[$_POST["value"]] = true;
}


?>

<ul>
      <?php $i = 0; ?>
       <?php foreach ($products as $product) : ?>
            <li>
                <ul>
                    <li><?= $product['id_order'] ?></li>
                    <li>
                        <form method="post">
                            <input type="hidden" name="value" value="<?= $i ?>">
                            <input type="submit" name="show" value="show"></form>
                    </li>
                    <?php if (isset($show[$i])) : ?>
                        <li><?= var_dump($user->cartHistoricdetails($product['id_order'])) ?></li>
                    <?php endif; ?>
                </ul>
                <?php $i++; ?>
            </li>

        <?php endforeach; ?>
    </ul>

