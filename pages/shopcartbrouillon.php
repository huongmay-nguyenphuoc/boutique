
<!--Si panier rempli-->
<?php if (isset($_SESSION['panier']) and !empty($_SESSION['panier'])) : ?>
    <?php $i = 0;?>
    <!--Affichage produit-->
    <?php foreach ($_SESSION['panier'] as $article) : ?>
        <div>

            <p>Title :<?= $article->getTitle() ?></p>
            <p>Price :<?= $article->getPrice() ?></p>
            <p>Quantity :</p><?= $article->getQuantity() ?></p>
            <form method="post" action="shopcart.php">
                <input type="hidden" name="position" value="<?= $i ?>">
                <input type="submit" name="removeOne" value="Delete">
            </form>
            <?php $i++; ?>
        </div>

    <?php endforeach; ?>

    <!--Affichage total et boutons action-->
    <p>Total : <?= $cart->getTotal() ?></p>

    <!--Affichage boutons vider panier-->
    <form method="post" action="shopcart.php">
        <input type="submit" name="removeAll" value="Empty Cart">
    </form>
    <?php if (isset($alert)) : ?>
        <div>
            <?= $alert ?>
            <form method="post" action="shopcart.php">
                <input type="submit" name="confirmremoveAll" value="Yes">
            </form>
        </div>
    <?php endif; ?>


    <!--Affichage bouton vérifier stock /paiement-->
    <div>
        <form method="post" action="shopcart.php">
            <input type="submit" name="verifyCart" value="Verify Stock">
        </form>
    </div>

    <?php if (isset($message)) : ?>
        <div>
            <?php foreach ($message as $mess) : ?>
                <?= $mess ?>
            <?php endforeach; ?>
        </div>
    <?php elseif (isset($success)) : ?>
        <div>
            <?= $success ?>
            <form method="post" action="shopcart.php">
                <input type="submit" name="pay" value="Pay">
            </form>
        </div>
    <?php endif; ?>

    <!--Si panier vide-->
<?php else : ?>
    <p>Nothing here!</p>
<?php endif;


 <tr>
            <?php $i = 0; ?>
            <?php while ($i <= 10) : ?>
            <?php if (isset($_SESSION['panier']) and !empty($_SESSION['panier'])) : */?><!--
            <?php /*foreach ($_SESSION['panier'] as $article) : */?>
            <td>
                <?/*= $i; */?>
                <div class="container">
                    <p>x<?/*= $article->getQuantity() */?></p>
                    <img src="../productPics/<?/*= $article->getPicture() */?>">
                </div>

                <div class="blocinfo">
                    <div>
                        <?/*= $article->getTitle() */?><br>
                        <?/*= $article->getPrice() */?><img height="15px"
                                                        src="../photo/style/diamond.png">
                    </div>
                    <form method="post" action="shopcart.php">
                        <input type="hidden" name="position" value="<?/*= $i */?>">
                        <input type="submit" name="removeOne" value="Remove">
                    </form>
                </div>-->
                <?php $i++; ?>
            </td>

            <?php if ($i == 5) : ?>
        </tr>
        <tr>
            <?php endif; ?>

            <?php endforeach; ?>
            <?php ; ?>
        </tr>

        <?php else : ?>
            <p>Nothing here!</p>
        <?php endif; ?>