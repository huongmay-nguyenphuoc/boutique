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

<main>
    <article>
        <div>
            <a href="boutique.php?cat=<?= $cat ?>&subcat=games">Games</a>
        </div>
        <div>
            <a href="boutique.php?cat=<?= $cat ?>&subcat=consoles">Consoles</a>
        </div>
        <div>
            <a href="boutique.php?cat=<?= $cat ?>&subcat=secondhand">Second Hand</a>
        </div>
    </article>
    <article>
        <div></div>
        <div class="text-box text-box2">
            <p>So you chose the <span><b><?= $cat ?></b></span> island?</p>
            <?php if ($cat = 'nintendo') :?>
            <p>This island is full of love and passion!</p>
            <p>You will be welcome warmly and heartily.</p>
            <?php elseif ($cat = 'xbox') :?>
                <p>This island is full of love and passion!</p>
                <p>You will be welcome warmly and heartily.</p>
            <?php elseif ($cat = 'playstation') :?>
                <p>This island is for the brave</p>
                <p>You will be welcome warmly and heartily.</p>
            <?php endif;?>
        </div>
    </article>
</main>