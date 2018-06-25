<?php
//Piste d'amélioration: créer des cases vides pour la fin du mois
//On crée un tableau associatif contenant les mois en valeurs et les nombres associés en index
$monthsList = array(1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre');
//On instancie un nouvel objet DateTime(); qu'on appelle $currentDate avec la date courante
$currentDate = new DateTime();
/* Grâce à une ternaire, on détermine la valeur à attribuer à $selectedMonth selon son existence
 * On utilise la méthode format pour formater la date et récupérer le numéro du mois courant
 */
$selectedMonth = (!empty($_POST['month']) ? $_POST['month'] : $currentDate->format('n'));
/* Grâce à une ternaire, on détermine la valeur à attribuer à $selectedYear selon son existence
 * On utilise la méthode format pour récupérer l'année courante
 */
$selectedYear = (!empty($_POST['year']) ? $_POST['year'] : $currentDate->format('Y'));
//On instancie un nouvel objet DateTime(); qu'on appelle $firstDayOfMonth avec la date sélectionnée via le formulaire
$firstDayOfMonth = new DateTime($selectedYear . '-' . $selectedMonth . '-' . '1');
//On utilise la méthode format pour formater la date et récupérer le numéro du mois sélectionné
$daysInMonth = $firstDayOfMonth->format('t');
//On utilise la méthode format pour formater la date et récupérer le numéro de la semaine du mois sélectionné
$firstWeekDayOfMonth = $firstDayOfMonth->format('N');
//On initialise un compteur de jour qui nous permettra d'afficher les jours dans le calendrier
$currentDay = 1;
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <title>Correction Calendrier Partie 9</title>
        <link href="../style.css" rel="stylesheet"/>
    </head>
    <body>
        <h1 class="sectionsTitles">TP Partie 9 PHP</h1>
        <div class="rule">
            <p>Faire un formulaire avec deux listes déroulantes. La première sert à choisir le mois, et le deuxième permet d'avoir l'année.
                En fonction des choix, afficher un calendrier comme celui ci :</p><br />
            <img src="calendar.png" />
        </div>
        <div class="answer">
            <form method="POST" action="calendrierCorrection.php">
                <select name="month">
                    <?php
                    //On crée une boucle qui va parcourir le tableau $monthsList et créer les options correspondantes
                    foreach ($monthsList as $monthNumber => $monthName) {
                        /* On remplit les attributs de <option> avec les valeurs correspondantes
                         * On utilise une ternaire pour créer l'attribut selected si le mois sélectionné est le mois en cours de création
                         */
                        ?>
                        <option value="<?= $monthNumber; ?>" <?= $selectedMonth == $monthNumber ? 'selected' : ''; ?>><?= $monthName; ?></option>
                    <?php }
                    ?>
                </select>
                <select name="year">
                    <?php
                    //On crée une boucle qui va de l'année 1900 à l'année 2100
                    for ($year = 1900; $year <= 2100; $year++) {
                        /* On remplit les attributs de <option> avec les valeurs correspondantes
                         * On utilise une ternaire pour créer l'attribut selected si l'année sélectionnée est l'année en cours de création
                         */
                        ?>
                        <option value="<?= $year; ?>" <?= $selectedYear == $year ? 'selected' : ''; ?>><?= $year; ?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="Générer le calendrier"/>
            </form>
        </div>
        <div class="calendar">
            <table>
                <thead>
                <th>Lundi</th>
                <th>Mardi</th>
                <th>Mercredi</th>
                <th>Jeudi</th>
                <th>Vendredi</th>
                <th>Samedi</th>
                <th>Dimanche</th>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        /* On détermine le nombre de cases du calendrier qu'on va stocker dans $sumOfTd
                         * On crée une boucle qui va créer des cases tant que $tdCount est inférieur à $sumOfTd
                         */
                        $sumOfTd = $daysInMonth + $firstWeekDayOfMonth - 1;
                        for ($tdCount = 1; $tdCount <= $sumOfTd; $tdCount++) {
                            /* Si le nombre de cases est supérieur ou égale au numéro du jour de la semaine du premier jour du mois,
                             * on commence le compte de jours
                             * On affiche $currentDay dans un <td> et on l'incrémente
                             */
                            if ($tdCount >= $firstWeekDayOfMonth) {
                                ?>
                                <td><?= $currentDay; ?></td>
                                <?php
                                $currentDay++;
                            } else {
                                // Sinon on crée une case vide
                                ?>
                                <td class="emptyDate"></td>
                                <?php
                            }
                            /* On vérifie que la case en cours de création est un multiple de 7
                             * Si c'est le cas, on a une semaine complète et on passe à la ligne avec <tr>
                             */
                            if ($tdCount % 7 == 0) {
                                ?>
                            </tr>
                            <tr>
                                <?php
                            }
                        }
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
