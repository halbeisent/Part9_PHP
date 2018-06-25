<!-- Je spécifie la locale avec setlocale -->
<?php 
setlocale(LC_TIME, 'fr_FR.utf8','fra'); 
$todaysDate = date('d-m-y');
$futureDate = date('d-m-y', strtotime('-22 days'));
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 8 Partie 9 PHP</title>
        <link rel="stylesheet" href="../style.css" />
    </head>
    <body>
        <div class="rule">
            <p>Afficher la date du jour - 22 jours.</p>
        </div>
        <div class="answer">
            <p><?= 'Aujourd\'hui, nous sommes le : ', $todaysDate;?></p>
            <p><?= 'Mais il y a 20 jours, nous étions le : ', $futureDate; ?></p>
        </div>
        <a href="../index.php" class="returnHome">Retour au menu des exercices</a>
    </body>
</html>
