<!-- Je spécifie la locale avec setlocale -->
<?php setlocale(LC_TIME, 'fr_FR.utf8','fra'); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 3 Partie 9 PHP</title>
        <link rel="stylesheet" href="../style.css" />
    </head>
    <body>
        <h1 class="sectionsTitles">Exercice 3 Partie 9 PHP</h1>
        <div class="rule">
            <p>Afficher la date courante avec le jour de la semaine et le mois en toutes lettres (ex : mardi 2 août 2016)
                <strong>Bonus :</strong> Le faire en français.</p>
        </div>
        <div class="answer">
            <!-- le setlocale utilisé plus haut ne semble fonctionner qu'avec strftime -->
            <p><?= 'Bonjour, nous sommes le : ', strftime('%A %d %B %Y');?></p>
        </div>
        <a href="../index.php" class="returnHome">Retour au menu des exercices</a>
    </body>
</html>
