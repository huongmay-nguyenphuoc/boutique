<?php
require_once('../classes/searchbar.php');
$search = new Searchbar();

/*Récupère résultat recherche*/
if (isset($_GET['q']) and !empty($_GET['q'])) {
    $submit = true;
    $query = htmlspecialchars($_GET['q']);
    $results = $search->selectArticles($query);
}
?>

<!--Barre de recherche-->
<form method="GET" action="search.php">
    <input type="search" name="q" placeholder="<?= $search->suggestArticles(); ?>"/>
    <input type="submit" value="Search"/>
</form>

<!--Affichage résultat-->
<?php if (isset ($submit)) : ?>
    <?php if (!empty($results)) : ?>
        <?php foreach ($results as $result) : ?>
            <ul>
                <li>
                    <ul>
                        <li><?= $result['title'] ?></li>
                        <li><?= $result['shortdesc'] ?></li>
                        <li><a href="fiche_produit.php?id=<?= $result['id_product'] ?>">More</a></li>
                    </ul>
                </li>
            </ul>
        <?php endforeach; ?>

    <?php else: ?>
        <p>Nothing here.</p>
    <?php endif; ?>
<?php endif; ?>
