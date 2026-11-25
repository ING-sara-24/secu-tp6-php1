// tout comentaire en php commence par deux slashs (slide 59)

<?php
    // Déclaration du tableau associatif multidimensionnel (slide 64)
    $serveurs = [
        "api-01" => ["cpu" => 45, "ram" => 60, "status" => "1"],
        "api-02" => ["cpu" => 92, "ram" => 78, "status" => "1"],
        "db-prod" => ["cpu" => 70, "ram" => 95, "status" => "1"],
        "web-01" => ["cpu" => 30, "ram" => 40, "status" => "1"],
        "web-02" => ["cpu" => 55, "ram" => 65, "status" => "0"],
        "cache-01" => ["cpu" => 88, "ram" => 92, "status" => "1"]
    ];

    // Déclaration des variables pour le résumé (slide 60)
    $total_online = 0;
    $somme_scores = 0;
    $best_score = -1;
    $best_serv = "";
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Exercice 2 - Monitoring</title>
    </head>
    <body>
        <table id="table1" border="1">
            <tr>
                <th>Serveur</th>
                <th>CPU%</th>
                <th>RAM%</th>
                <th>Status</th>
                <th>Score</th>
                <th>État</th>
            </tr>
            <?php
                // Boucle foreach pour parcourir le tableau (slide 69)
                foreach ($serveurs as $nom => $data) {
                    $cpu = $data["cpu"];
                    $ram = $data["ram"];
                    $status = $data["status"];

                    // ici on utilise des operations (slide 66)
                    $score = 100 - (($cpu + $ram) / 2);

                    $etat = "";
                    // ici on utilise la structure conditionnelle (slide 67)
                    if ($cpu > 85 || $ram > 90) {
                        $etat = "CRITIQUE";
                    } elseif ($score >= 50) {
                        $etat = "OK";
                    } else {
                        $etat = "ATTENTION";
                    }

                    $couleur = "";
                    if ($status == "0") {
                        $couleur = "rgb(200,200,200)"; // Gris
                    } elseif ($cpu > 85 || $ram > 90) {
                        $couleur = "rgb(255,180,180)"; // Rouge
                    } elseif ($score >= 50) {
                        $couleur = "rgb(180,255,180)"; // Vert
                    } else {
                        $couleur = "rgb(255,220,150)"; // Orange
                    }

                    // ici on utilise la structure conditionnelle (slide 67)
                    if ($status == "1") {
                        $total_online++;
                    }
                    $somme_scores += $score;
                    if ($score > $best_score) {
                        $best_score = $score;
                        $best_serv = $nom;
                    }
                    $status_text = ($status == "1") ? "online" : "offline";

                    //ici on utilise echo pour afficher les lignes du tableau (slide 61)
                    echo "<tr class='row' style='background-color: $couleur;'>";
                    echo "<td class='serveur'>" . $nom . "</td>";
                    echo "<td class='cpu'>" . $cpu . "</td>";
                    echo "<td class='ram'>" . $ram . "</td>";
                    echo "<td class='status'>" . $status_text . "</td>";
                    echo "<td class='score'>" . $score . "</td>";
                    echo "<td class='etat'>" . $etat . "</td>";
                    echo "</tr>";
                }

                // ici on utilise une fonction essentielle (count) (slide 65)
                $moy_scores = $somme_scores / count($serveurs);
            ?>
        </table>

        <h3>Résumé</h3>
        <p>Serveurs online: <span id="total_online_servers"><?php echo $total_online; ?></span></p>
        <p>Score moyen: <span id="moy_scores"><?php echo number_format($moy_scores, 1); ?></span></p>
        <p>Meilleur serveur: <span id="best_serv"><?php echo $best_serv . " (" . $best_score . ")"; ?></span></p>

    </body>
</html>