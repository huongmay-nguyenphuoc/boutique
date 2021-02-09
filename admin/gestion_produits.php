
<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';

session_start();

$pdo = new PDO('mysql:host=localhost;dbname=boutique', 'root', '');


/*
if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1){
    exit();
    
}
*/



if(isset($_GET['confirm']) AND !empty($_GET['confirm'])){
    $confirm = (int) $_GET['confirm'];

    $requete = $pdo->prepare('UPDATE products SET confirm = 1 WHERE id = ?');
    $requete->execute(array($confirm));
}

if(isset($_GET['supprime']) AND !empty($_GET['supprime'])){
    $supprime = (int) $_GET['supprime'];

    $requete = $pdo->prepare('DELETE FROM products WHERE id = ?');
    $requete->execute(array($supprime));
}


$products = $pdo->prepare('SELECT * FROM products ORDER BY category DESC');
$products->execute();


?>





<html>
  
  <body>

    <ul>

    <?php while($p = $products->fetch(PDO::FETCH_ASSOC)) { ?>

        <li> <?= $p['id_product'] ?> : <?= $p['title'] ?> - 
    
        <?php if($p['confirm'] == 0) { ?> 

            <a href="gestion_boutique.php?update=<?= $p['id_product']?>">
            Update</a> - 

            <a href="gestion_boutique.php?supprime=<?= $p['id_product']?>">
            Delete</a>


        <?php }?>
        
        </li>

        <?php } ?>

    </ul>


    <article class="container">

            <a class="waves-effect waves-light white black-text btn-small" href="gestion_product_form.php"> Add new products </a>
        </article>
  </body>

</html>