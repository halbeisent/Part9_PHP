<?php
$numberOfDays = cal_days_in_month(CAL_GREGORIAN, 2, 2016);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 6 Partie 9 PHP</title>
        <link rel="stylesheet" href="../style.css" />
    </head>
    <body>
        <h1 class="sectionsTitles">Exercice 6 Partie 9 PHP</h1>
        <div class="rule">
            <p>Afficher le nombre de jour dans le mois de février de l'année 2016.</p>
        </div>
        <div class="answer">
            <p><?= 'En février 2016, il y avait ', $numberOfDays, ' jours';?></p>
        </div>
        <a href="../index.php" class="returnHome">Retour au menu des exercices</a>
    </body>
</html>
