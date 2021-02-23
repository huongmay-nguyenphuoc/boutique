
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


<table>
    <thead>

    </thead>
    <tbody>
    <?php $i = 0; ?>
    <?php foreach ($_SESSION['user']->ordersUser() as $orders): ?>
        <tr>
            <th>Commande</th>
        </tr>
        <tr>
            <th>date_register</th>
            <th>total</th>
            <th>state</th>

        </tr>
        <tr>
            <td><?= $orders['date_register'] ?></td>
            <td><?= $orders['amount'] ?></td>
            <td><?= $orders['state'] ?></td>
        </tr>

        <form method="post">
            <input type="hidden" name="value" value="<?= $i ?>">
            <input type="submit" name="show" value="show">
        </form>


    <?php endforeach; ?>
    </tbody>
</table>

<!-- <?php /*if (isset($show[$i])) :*/?>

            <?php /*foreach ($_SESSION['user']->ordersUserDetails($orders['id_order']) as $details) : */?>

                <tr>
                    <th>title</th>
                    <th>price</th>
                    <th>quantity</th>
                </tr>

                <tr>
                    <td><?/*= $details['title'] */?></td>
                    <td><?/*= $details['price'] */?></td>
                    <td><?/*= $details['quantity'] */?></td>
                </tr>
            <?php /*endforeach; */?>

            <?php /*endif; */?>
            --><?php /*$i++; */?>
