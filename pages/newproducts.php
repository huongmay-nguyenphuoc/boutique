<?php
$title = "new";
$bodyname = "bodyNew";
require_once('../classes/shop.php');
$shop = new shop;

$datas = $shop->selectLastProducts();
//var_dump($datas);

?>



<?php include '../includes/header.php'; ?>
<main>
<section>
<article>
    <?php if (!empty($datas)) : ?>

    <ul class="listResult">
        <?php foreach ($datas as $data) : ?>

            <li>
                <ul>
                    <li style="text-transform: uppercase"><b><?= $data->getTitle() ?></b></li>
                    <li><?= $data->getShortdesc() ?></li>
                    <li class="barre"><a href="fiche_produit.php?id=<?= $data->getId() ?>">See
                            product</a></li>
                    <li class="barre">----------<+>-----------</li>
                    <br>
                </ul>
            </li>

        <?php endforeach; ?>
    </ul>
    <?php else: ?>
    <p>Nothing here.</p>
    <?php endif; ?>



</article>
<article></article>
</section>
</main>
