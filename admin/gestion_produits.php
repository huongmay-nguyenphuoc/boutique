
<?php

require_once '../classes/admin.php';
require_once '../classes/user.php';
require_once '../classes/database.php';

session_start();





if(!isset($_SESSION['user']->getStatus) OR $_SESSION['user']->getStatus != 1){
    exit();
    
}
 else{
     $historic = $_SESSION['admin']->productsHistoric(); //récup historique général
 }





?>





<html lang="fr">
  
  <body>

    <ul>

    <?php while($p = $products->fetch(PDO::FETCH_ASSOC)) { ?>

        <li> <?= $p['id_product'] ?> : <?= $p['title'] ?> - 
    
        <?php if($p['confirm'] == 0) { ?> 

            <a href="gestion_product_form.php?update=<?= $p['id_product']?>">
            Update</a> - 

            <a href="gestion_product_form.php?supprime=<?= $p['id_product']?>">
            Delete</a>


        <?php }?>
        
        </li>

        <?php } ?>

    </ul>


    <?php if (empty($historic)) : ?>
        <section class="container">
            <p class="white-text">You didn't buy anything yet.</p>
            <a href="boutique.php" class="btn grey white-text">Go search something for spmething fun to play!</a>
        </section>



        <!--Affichage tableau historique-->
        <section class="sectionHistoric">
            <h5 class="center"><em>Cart historic</em></h5>

            <table class='centered tableHistoric'>
                <?php
                $i = 1;
                foreach ($historic as $row) {
                    if ($i == 1) {
                        echo "<thead>";
                        foreach ($row as $key => $element) {
                            echo "<th>" . $key . "</th>";
                        }
                        echo "</thead>";
                        echo "<tbody>";
                        $i = 0;
                    }
                    echo "<tr>";
                    foreach ($row as $cell) {
                        echo "<td>" . $cell . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody>";
                ?>
            </table>
        </section>
    <?php endif; ?>




    <article class="container">

            <a class="waves-effect waves-light white black-text btn-small" href="gestion_product_form.php"> Add new products </a>
        </article>
  </body>

</html>