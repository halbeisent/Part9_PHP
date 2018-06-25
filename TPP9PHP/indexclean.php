<?php
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME, 'fr_FR.utf8','fra'); 
//Déclaration des variables
$monthList = array(1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre');
$dayList = array('Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche');
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
            <img src="calendar.png" />
        </div>
        <div class="answer">
            <form method="POST" action="indexclean.php">
                <!--Définition des valeurs de la liste déroulante pour l'année-->
                <label for="Année">Veuillez choisir une année:
                    <div class="input-field col s12">
                        <select name="yearSelector">
                            <!--L'option est en selected et disabled pour servir de placeholder-->
                            <option value="0" disabled selected>Année</option>
                            <!--J'utilise ici un foreach plus adapté aux tableaux-->
                            <?php for ($yearOption = 1900; $yearOption <= 2100; $yearOption++) { ?>
                            <!--Je remplis les paramètres du sélecteur avec le contenu de ma variable-->
                            <option value=<?= $yearOption; ?>><?= $yearOption; ?></option>
                            <?php } 
                            //Je remplis la variable $selectedYear avec le $_POST
                            $selectedYear = $_POST['yearSelector']; ?>
                        </select>
                    </div>
                </label>
                <label for="Année">Veuillez choisir un mois:
                    <div class="input-field col s12">
                        <select name="monthSelector">
                            <!--L'option est en selected et disabled pour servir de placeholder-->
                            <option value="0" disabled selected>Mois</option>
                            <!--J'utilise ici un foreach plus adapté aux tableaux-->
                            <?php foreach ($monthList as $monthNumber => $monthName) {  ?>
                            <!--Je remplis les paramètres du sélecteur avec le contenu de ma variable-->
                            <option value=<?= $monthNumber; ?>><?= $monthName; ?></option>
                            <?php } 
                            //Je remplis la variable $selectedMonth avec le $_POST
                            $selectedMonth = $_POST['monthSelector']; ?>
                        </select>
                    </div>
                </label>
                <input type="submit" value="Afficher le calendrier" />
            </form>
        </div>
        <div class="calendar">
            <!--Je concatène deux variables pour créer le titre de mon calendrier-->
            <h2><?= $monthList[$selectedMonth] . ' ' . $selectedYear ; ?></h2>
            <table>
                <thead>
                    <tr>
                        <!--J'utilise le foreach mieux adapté au tableau-->
                        <?php foreach ($dayList as $dayName) { ?>
                        <th><?= $dayName; ?></th>
                       <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                    $firstDay = 1;
                    //Je génère une date avec les valeurs précédemment récoltées
                    $lastDay = date('t', strtotime($selectedYear . '-' . $selectedMonth . '-' . $firstDay));
                    $dayNumber = date('N', strtotime($selectedYear . '-' . $selectedMonth . '-' . $firstDay));
                    //Je définis une variable définissant le nombre maximum de cellules d'une ligne
                    $maxCellNumber = 7;
                    $dayOfWeek = 0;
                    //Je démarre le premier jour à 1, mon compteur de boucle à 1, tant que le jour contenu dans $dayNumber est inférieur ou égale à $lastDay, j'incrémente $dayNumber et $dayLoopCount
                    for ($dayNumber = 1, $dayLoopCount = 1; $dayNumber <= $lastDay; $dayNumber++, $dayLoopCount++) { ?>
                        <!--Je remplis la cellule avec le contenu de $dayNumber-->
                    <td><?= $dayNumber;?></td>
                    <!--Si $dayLoopCount n'est plus divisible par $maxCellNumber et que $dayLoopCount n'est pas égal à 0-->
                    <?php if($dayLoopCount % $maxCellNumber == 0 && $dayLoopCount != 0) { ?>
                    <!--Je ferme ma ligne et j'en rouvre une-->
                    </tr><tr>
                    <?php };
                    echo $dayNumber; } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>