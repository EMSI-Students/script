<!-- Exercice 2: -->
<?php
function calculerMoyenneTableau($tab)
{
    $somme = 0;
    $count = 0;

    foreach ($tab as $val) {
        $somme += $val;
        $count++;
    }

    if ($count == 0) {
        return "Le tableau est vide";
    }

    return $somme/$count;
}

function calculerMoyenneNombres(...$valeurs)
{
    $somme = 0;
    $count = 0;

    foreach ($valeurs as $val) {
        $somme += $val;
        $count++;
    }

    if ($count == 0) {
        return "Aucun argument n'est passé";
    }

    return $somme / $count;
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
    <p>
        <?php
            $tableau = [1, 2, 3, 4];
            echo calculerMoyenneTableau($tableau);
            ?>
            <br>
        <?php
            echo calculerMoyenneNombres(1, 2, 3, 4);
        ?>
    </p>
</body>

</html>
