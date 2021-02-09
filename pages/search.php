<?php
require_once('../classes/searchbar.php');
$search = new Searchbar();

if (isset($_GET['q']) and !empty($_GET['q'])) {
    $query = htmlspecialchars($_GET['q']);
    $results = $search->selectArticles($query);
}
?>


    <form method="GET" action="search.php">
        <input type="search" name="q" placeholder="<?= $search->suggestArticles(); ?>"/>
        <input type="submit" value="Rechercher"/>
    </form>

<?php if (!empty($results)) {
    foreach ($results as $result) :?>
        <ul>
            <li>
                <ul>
                    <li><?= $result['title'] ?></li>
                    <li><?= $result['shortdesc'] ?></li>
                    <li><a href="fiche_produit.php?id=<?= $result['id_product']?>">voir plus</a></li>
                </ul>
            </li>
        </ul>
    <?php endforeach;
} ?>