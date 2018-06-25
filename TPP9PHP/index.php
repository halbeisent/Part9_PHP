<?php
//Je déclare mes variables
//Tableau associatif contenant les années (nécessaire pour le sélecteur)
$yearSelectorOptValue = 1;
//Tableau associatif contenant les mois (nécessaire pour le sélecteur)
$monthSelector = array(1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre');
//Tableau associatif contenant les jours
$weekDays = array(1 => 'Lundi', 2 => 'Mardi', 3 => 'Mercredi', 4 => 'Jeudi', 5 => 'Vendredi', 6 => 'Samedi', 7 => 'Dimanche');
//Variable qui va stocker le mois sélectionné dans les listes déroulantes
$selectedMonth = $monthSelector[$_POST['Mois']];
//Je récupère numéro du mois via le POST
$monthNumber = $_POST['Mois'];
$currentDay = 1;
$tdcount = 0;
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>TP Partie 9 PHP</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css" />
        <link rel="stylesheet" href="../style.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <script src="script.js"></script>
    </head>
    <body>
        <h1 class="sectionsTitles">TP Partie 9 PHP</h1>
        <div class="rule">
            <p>Faire un formulaire avec deux listes déroulantes. La première sert à choisir le mois, et le deuxième permet d'avoir l'année.
                En fonction des choix, afficher un calendrier comme celui ci :</p><br />
            <img src="calendar.png"></img>
        </div>
        <div class="answer">
            <form method="post" action="index.php">
                <!--Définition des valeurs de mes listes déroulantes-->
                <label for="Année">Veuillez choisir une année : 
                    <div class="input-field col s12">
                        <select name="yearSelector">
                            <option value="" disabled selected>Année</option>
                            <?php for ($yearSelect = 1900; $yearSelect <= 2100; $yearSelect++) { ?>
                            <option value=<?= $yearSelectorOptValue ?>><?= $yearSelect ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </label><br />
                <!--Définition des valeurs de mes listes déroulantes-->
                <label for="Mois">Veuillez choisir un mois:
                    <div class="input-field col s12">
                        <select name="Mois">
                            <option value="0" disabled selected>Choisir un mois</option>
                            <option value="1">Janvier</option>
                            <option value="2">Février</option>
                            <option value="3">Mars</option>
                            <option value="4">Avril</option>
                            <option value="5">Mai</option>
                            <option value="6">Juin</option>
                            <option value="7">Juillet</option>
                            <option value="8">Août</option>
                            <option value="9">Septembre</option>
                            <option value="10">Octobre</option>
                            <option value="11">Novembre</option>
                            <option value="12">Décembre</option>
                        </select>
                    </div>
                </label><br />
                <input type="submit" value="afficher le calendrier" /><br />
                <?php 
                echo $yearSelect;
                $generatedDate = $yearSelect . '-' . $_POST['Mois'] . '-' . $currentDay;
                $lastDay = date('t',strtotime($generatedDate));
                ?>
        </div>
        <!--Partie d'affichage du calendrier-->
        <div class="calendar">
            <!--Affichage du titre en dynamique-->
            <h2><?= sprintf('%s %s', $selectedMonth, $yearSelect); ?></h2>
            <table>
                <tr>
                    <!--Utilisation d'un foreach pour créer les en-têtes à partir de l'array $weekDays-->
                    <?php foreach ($weekDays as $key => $day) { ?>
                    <th><?= $day; ?></th>
                    <?php } ?>
                </tr>
                <!--Tant que la valeur de $currentDay est inférieure à celle de $lastDay,-->
                <tbody>
            <?php while ($currentDay <= $lastDay) { ?>
                    <!--On affiche la valeur de $currentDay-->
                <td><?= $currentDay ?></td>
                <!--Puis on l'incrémente-->
            <?php $currentDay++;
            } ?>
                </tbody>
        </div>
    </body>
</html>
