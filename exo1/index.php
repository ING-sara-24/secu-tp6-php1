// tout comentaire en php commence par deux slashs (slide 59)

<?php
    // Déclaration du tableau associatif (slide 64)
    $etudiantsNote = [
        "JOHN" => 9,
        "BOB" => 15.5,
        "RAYANE" => 7,
        "ROSIE" => 13
    ];

    // ici on declare une fonction avec paramètre (slide 71)
    function estAdmissible($note) {
        // ici on utilise la structure conditionnelle (slide 67)
        if ($note >= 10) {
            return true;
        } else {
            return false;
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Exercice 1 - Etudiants</title>
    </head>
    <body>
        <table id="table1" border="1">
            <tr>
                <th>Etudiant</th>
                <th>Note</th>
            </tr>
            <?php
                // Boucle foreach pour parcourir le tableau (slide 69)  
                foreach ($etudiantsNote as $nom => $note) {
                    $admis = estAdmissible($note);
                    if ($admis) {
                        $couleur = "rgb(136,248,136)";
                    } else {
                        $couleur = "rgb(251,173,173)";
                    }
                    //ici on utilise echo pour afficher les lignes du tableau (slide 61)
                    echo "<tr class='row' style='background-color: $couleur;'>";
                    echo "<td class='etud'>" . $nom . "</td>";
                    echo "<td class='note'>" . $note . "</td>";
                    echo "</tr>";
                }
            ?>
        </table>

    </body>
</html>