<?php

$category = $_GET['cat'];
echo $category;
?>

<a href="boutique.php?cat=<?=$category?>&subcat=games">Games</a>
<a href="boutique.php?cat=<?=$category?>&subcat=consoles">Consoles</a>
<a href="boutique.php?cat=<?=$category?>&subcat=secondhand">Second Hand</a>