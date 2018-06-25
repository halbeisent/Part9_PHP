<?php
$todaysDate = time();
$pastDate = strtotime('16-05-2016');
$pastDays = $todaysDate - $pastDate;
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 5 Partie 9 PHP</title>
        <link rel="stylesheet" href="../style.css" />
    </head>
    <body>
        <h1 class="sectionsTitles">Exercice 5 Partie 9 PHP</h1>
        <div class="rule">
            <p>Afficher le nombre de jour qui sépare la date du jour avec le 16 mai 2016.</p>
        </div>
        <div class="answer">
            <p><?= round($pastDays / (60 * 60 * 24)),  ' jours nous déparent d\'aujourd\'hui' ?></p>
        </div>
        <a href="../index.php" class="returnHome">Retour au menu des exercices</a>
    </body>
</html>
