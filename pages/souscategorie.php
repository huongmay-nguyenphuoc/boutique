<?php
/*Gestion erreurs des infos dans l'URL*/
$cats = array('nintendo', 'xbox', 'playstation');
if (in_array(($_GET['cat']), $cats)) {
    $cat = htmlspecialchars($_GET['cat']);
} else {
    header('location:404.php');
}


if ($cat == 'nintendo') {
    $bodyname = 'bodySubCatNintendo bodySubCat';
} elseif ($cat == 'playstation') {
    $bodyname = 'bodySubCatPlayS bodySubCat';
} elseif ($cat == 'xbox') {
    $bodyname = 'bodySubCatxbox bodySubCat';
        }

$title = $cat;
?>
<?php require_once('../includes/header.php'); ?>
<main>

    <article id="gouttesArticle">
        <section>
            <div class="gouttes">
                <a href="boutique.php?cat=<?= $cat ?>&subcat=games">1</a> <span>< &nbsp;  Games shop</span>
            </div>
        </section>
        <section>
            <div class="gouttes">
                <a href="boutique.php?cat=<?= $cat ?>&subcat=consoles">2 </a>
                <span>< &nbsp;  Consoles shop</span>
            </div>
        </section>
        <section>
            <div class="gouttes">
                <a href="boutique.php?cat=<?= $cat ?>&subcat=secondhand">3 </a>
                <span><  &nbsp; Secondhand shop</span>
            </div>
        </section>
    </article>

    <article>
        <div id="legend">

            <p>1. Games shop</p>
            <p>2. Consoles shop</p>
            <p>3. Seconhand shop</p>

        </div>

        <div class="text-box text-box2">
            <p>So you chose the <span class="spanName"><b><?= $cat ?></b></span> island?</p>
            <?php if ($cat == 'nintendo') : ?>
                <p>This island is full of love and passion!</p>
                <p>You will be welcome warmly and heartly.</p>
            <?php elseif ($cat == 'xbox') : ?>
                <p>This island is where the impossible comes true!</p>
                <p>You will find out who you are and what you can do.</p>
            <?php elseif ($cat == 'playstation') : ?>
                <p>This island is for the brave and the fearless!</p>
                <p>You will be welcome with solemnity and frankness.</p>
            <?php endif; ?>
        </div>
    </article>
</main>