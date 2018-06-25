<!-- Je spécifie la locale avec setlocale -->
<?php 
setlocale(LC_TIME, 'fr_FR.utf8','fra'); 
$todaysDate = date('d-m-y');
$futureDate = date('d-m-y', strtotime('+20 days'));
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 7 Partie 9 PHP</title>
        <link rel="stylesheet" href="../style.css" />
    </head>
    <body>
        <h1 class="sectionsTitles">Exercice 7 Partie 9 PHP</h1>
        <div class="rule">
            <p>Afficher la date du jour + 20 jours.</p>
        </div>
        <div class="answer">
            <p><?= 'Aujourd\'hui, nous sommes le : ', $todaysDate;?></p>
            <p><?= 'Mais dans 20 jours, nous serons le : ', $futureDate; ?></p>
        </div>
        <a href="../index.php" class="returnHome">Retour au menu des exercices</a>
    </body>
</html>
