<?php 
$todaysDate = date('j-m-Y');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Exercice 2 Partie 9 PHP</title>
        <link rel="stylesheet" href="../style.css" />
    </head>
    <body>
        <h1 class="sectionsTitles">Exercice 2 Partie 9 PHP</h1>
        <div class="rule">
            <p>Afficher la date courante en respectant la forme jj-mm-aaaa (ex : 16-05-2016)</p>
        </div>
        <div class="answer">
        <p><?= sprintf('Bonjour!, nous sommes le %s', $todaysDate);?></p>
        </div>
        <a href="../index.php" class="returnHome">Retour au menu des exercices</a>
    </body>
</html>
