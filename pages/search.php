<?php
require_once('../classes/searchbar.php');
$search = new Searchbar();
$title = "search";
$bodyname = "bodySearch";

/*Récupère résultat recherche*/
if (isset($_GET['q']) and !empty($_GET['q'])) {
    $submit = true;
    $query = htmlspecialchars($_GET['q']);
    $results = $search->selectArticles($query);
}
?>

<?php include '../includes/header.php'; ?>
    <main>

        <!--Barre de recherche-->
        <section>
            <?php if (!isset($submit)) : ?>
                <form method="GET" action="search.php">
                    <input type="search" name="q" placeholder="<?= $search->suggestArticles() ?>"/>
                    <input type="submit" hidden name="">
                </form>
            <?php elseif (isset($submit)) : ?>
                <form method="GET" action="search.php">
                    <input type="search" name="q" placeholder="<?= $query ?>"/>
                    <input type="submit" hidden name="">
                </form>
            <?php endif; ?>

        </section>

        <section>
            <!--Affichage résultat-->
            <?php if (isset ($submit)) : ?>
                <?php if (!empty($results)) : ?>

                    <p><small><?= count($results) ?> résultat(s)</small></p><br>
                    <ul>
                        <?php foreach ($results as $result) : ?>

                            <li>
                                <ul>
                                    <li style="text-transform: uppercase"><?= $result['title'] ?></li>
                                    <li><?= $result['shortdesc'] ?></li>
                                    <li class="barre"><a href="fiche_produit.php?id=<?= $result['id_product'] ?>">See
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
            <?php endif; ?>
        </section>

    </main>


<?php include '../includes/footer.php'; ?>