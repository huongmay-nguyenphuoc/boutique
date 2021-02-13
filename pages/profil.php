<?php

require_once '../classes/user.php';
require_once '../classes/cart.php';

session_start();

if (isset($_SESSION['user'])) {

     $historic = $_SESSION['user']->cartHistoric(); //récup historique général

}



else{

    header('location: connexion.php');

}
?>


<html lang="en">

<main class="center mainSpace">

        <article class="container">
            <h3><em>Profil @<?php echo $_SESSION['user']->getLogin(); ?></em></h3>
            <a class="waves-effect waves-light white black-text btn-small" href="update.php">Modifier vos
                identifiants</a>
        </article>

    <?php if (empty($historic)) : ?>
    <section class="container">
        <p class="white-text">You didn't buy anything yet.</p>
        <a href="boutique.php" class="btn grey white-text">Go search something for something fun to play!</a>
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


<?php
    $products = $_SESSION['user']->cartHistoric();
    //var_dump($user->cartHistoricdetails(26));

    /*Traitement bouton description*/
    if (isset($_POST['show'])) {
     $show[$_POST["value"]] = true;
    }


    ?>

    <ul>
        <?php $i = 0; ?>
        <?php foreach ($products as $product) : ?>
            <li>
                <ul>
                    <li><?= $product['id_order'] ?></li>
                    <li>
                        <form method="post">
                            <input type="hidden" name="value" value="<?= $i ?>">
                            <input type="submit" name="show" value="show"></form>
                    </li>
                    <?php if (isset($show[$i])) : ?>
                        <li><?= var_dump($user->cartHistoricdetails($product['id_order'])) ?></li>
                    <?php endif; ?>
                </ul>
                <?php $i++; ?>
            </li>

        <?php endforeach; ?>
    </ul>



</main>

</html>