<?php
/*Gestion erreurs des infos dans l'URL*/
$cats = array('nintendo', 'xbox', 'playstation');
if (in_array(($_GET['cat']),$cats)) {
    $cat = htmlspecialchars($_GET['cat']);
} else {
    header('location:404.php');
}
?>

<head>
    <title><?= $cat?></title>
</head>

<h5><?= $cat?></h5>
<a href="boutique.php?cat=<?=$cat?>&subcat=games">Games</a>
<a href="boutique.php?cat=<?=$cat?>&subcat=consoles">Consoles</a>
<a href="boutique.php?cat=<?=$cat?>&subcat=secondhand">Second Hand</a>