<!-- Exercice 3: -->
<?php
$tab = [
    ["reference" => "ref001", "marque" => "HP", "prix_unitaire" => 7500, "quantite" => 13],
    ["reference" => "ref002", "marque" => "Apple", "prix_unitaire" => 12000, "quantite" => 9],
    ["reference" => "ref003", "marque" => "Toshiba", "prix_unitaire" => 6500, "quantite" => 12],
    ["reference" => "ref004", "marque" => "Lenovo", "prix_unitaire" => 9000, "quantite" => 8]
];
$taux = [
    "HP" => 0.8,
    "Apple" => 0.9,
    "Toshiba" => 0.7,
    "Lenovo" => 0.6
];

function calculerPrixTotal($infos, $taux)
{
    $tab_prix_total = [];
    foreach ($infos as $t) {
        if ($t["quantite"] > 10) {
            $prix_total = $t["prix_unitaire"] * $t["quantite"] * $taux[$t["marque"]];
        } else {
            $prix_total = $t["prix_unitaire"] * $t["quantite"];
        }
        $t["prix_total"] = $prix_total;
        $tab_prix_total[] = $t;
    }
    return $tab_prix_total;
}

function afficherTable($tab)
{
?>
    <table border="1px" cellpadding="3px" cellspacing="0px">
        <tr>
            <?php
            foreach ($tab[0] as $nom => $valeur) {
            ?>
                <th>
                    <?php
                    echo $nom;
                    ?>
                </th>
            <?php
            } ?>
        </tr>
        <?php
        foreach ($tab as $t) {
        ?>
            <tr>
                <?php
                foreach ($t as $valeur) {
                ?>
                    <td>
                        <?php
                        echo $valeur;
                        ?>
                    </td>
                <?php
                } ?>
            </tr>
        <?php
        } ?>
    </table>
<?php
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $tab_prix_total = calculerPrixTotal($tab, $taux);
    afficherTable($tab_prix_total);
    ?>
</body>

</html>
