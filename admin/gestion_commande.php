<?php

require_once '../classes/admin.php';

require_once '../classes/user.php';

session_start();

function scoreByMoves($level)
{
    $topMoves = $this->pdo->Select("SELECT login, score.id as 'partie n°', nb_coup as 'coups' FROM score inner join utilisateurs on score.id_utilisateur = utilisateurs.id WHERE niveau = :level ORDER BY nb_coup ASC LIMIT 10",
        ['level' => $level]);
    return $topMoves;
}

public function scoreByTime($level)
{
    $toptime = $this->pdo->Select("SELECT login, score.id as 'partie n°', time as 'temps' FROM score inner join utilisateurs on score.id_utilisateur = utilisateurs.id WHERE niveau = :level ORDER BY time ASC LIMIT 10",
        ['level' => $level]);
    return $toptime;
}

if(!isset($_SESSION['id']) OR $_SESSION['id'] != 1){
    exit();
    
}
?>

<html>


<!--si niveau sélectionné a des scores-->
<?php else : ?>
<section class="sectionFame">
    <?php foreach ($twoTables as $name => $oneTable) : ?>
    <div class="divtableFame">
        <table class='centered tableFame'>
            <h6><em>Top 10 par <?php echo $name; ?></em></h6>
            <?php $i = 1; ?>
                                <?php foreach ($oneTable as $row) {
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
    </div>
    <?php endforeach; ?>
</section>
<?php endif; ?>




</html>