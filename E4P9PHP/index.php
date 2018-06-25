<?php 
//Je spécifie le fuseau horaire que je veux utiliser
date_default_timezone_set('Europe/Paris');
//Je spécifie le formatage que je veux
setlocale(LC_TIME, 'fr_FR.utf8','fra'); 
$requiredDate = strtotime('2016-08-02T15:00:00+02:00');
$todaysDate = mktime();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 3 Partie 9 PHP</title>
        <link rel="stylesheet" href="../style.css" />
    </head>
    <body>
        <h1 class="sectionsTitles">Exercice 4 Partie 9 PHP</h1>
        <div class="rule">
            <p>Afficher la date courante avec le jour de la semaine et le mois en toutes lettres (ex : mardi 2 août 2016)<br />
                <strong>Bonus :</strong> Le faire en français.</p>
        </div>
        <div class="answer">
            <!-- le setlocale utilisé plus haut ne semble fonctionner qu'avec strftime -->
            <p>J'ai choisi d'utiliser le format de timestamp unix</p>
            <p><?= 'Le timestamp actuel est : ', $todaysDate; ?></p>
            <p><?= 'Le timestamp du 2 août 2016 à 15:00 est le : ', $requiredDate;?></p>
        </div>
        <a href="../index.php" class="returnHome">Retour au menu des exercices</a>
    </body>
</html>
