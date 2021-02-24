<?php
/*Gestion erreurs des infos dans l'URL*/
$cats = array('nintendo', 'xbox', 'playstation');
if (in_array(($_GET['cat']), $cats)) {
    $cat = htmlspecialchars($_GET['cat']);
} else {
    header('location:404.php');
}

$title = $cat;
?>
<?php require_once('../includes/header.php'); ?>

<?php if ($cat == 'nintendo') : ?>
<main id="mainsubCatNintendo">
    <?php elseif ($cat == 'playstation') : ?>
    <main id="mainsubCatPlayS">
        <?php elseif ($cat == 'xbox') : ?>
        <main id="mainsubCatxbox">
            <?php endif; ?>

            <article id="gouttesArticle">
                <div class="gouttes">
                    <a href="boutique.php?cat=<?= $cat ?>&subcat=games">1 <span>Games shop</span> </a>
                </div>
                <div class="gouttes">
                    <a href="boutique.php?cat=<?= $cat ?>&subcat=consoles">2 <span>Consoles shop</span> </a>
                </div>
                <div class="gouttes">
                    <a href="boutique.php?cat=<?= $cat ?>&subcat=secondhand">3 <span>Secondhand shop</span> </a>
                </div>
            </article>

            <article>
                <div id="legend">

                        <p>1. Games shop</p>
                        <p>2. Consoles shop</p>
                        <p>3. Seconhand shop</p>

                </div>

                <div class="text-box text-box2">
                    <p>So you chose the <span><b><?= $cat ?></b></span> island?</p>
                    <?php if ($cat == 'nintendo') : ?>
                        <p>This island is full of love and passion!</p>
                        <p>You will be welcome warmly and heartily.</p>
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