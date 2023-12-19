<!-- Exercice 2 (Première Partie, Deuxième Version): -->
<?php
$first = $second = 0;
$result = null;
$erreurs = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = $_POST["first"];
    $second = $_POST["second"];

    if (isset($_POST["btn-ajouter"])) {
        $result = $first + $second;
    } elseif (isset($_POST["btn-soustraire"])) {
        $result = $first - $second;
    } elseif (isset($_POST["btn-multiplier"])) {
        $result = $first * $second;
    } elseif (isset($_POST["btn-diviser"])) {
        if ($second) {
            $result = $first / $second;
        } else {
            $erreurs[] = "Division par zéro est impossible";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1>Calculatrice simple</h1>
        <form action="" method="post">
            <div class="row">
                <div class="col-10">
                    <input type="number" name="first" id="first" class="form-control" value="<?= $first; ?>">
                </div>
                <label for="first" class="col-2 form-label">Premier numéro</label><br>
            </div>
            <div class="row">
                <div class="col-10">
                    <input type="number" name="second" id="second" class="form-control <?= $erreurs ? "is-invalid" : ""; ?>" value="<?= $second; ?>">
                    <?php
                    if ($erreurs) {
                    ?>
                        <span class="invalid-feedback"><?= $erreurs[0]; ?></span><br>
                    <?php
                    }
                    ?>
                </div>
                <label for="second" class="col-2 form-label">Deuxième numéro</label><br>
            </div>
            <div class="row">
                <div class="col-10">
                    <input type="text" name="result" id="result" disabled class="form-control" value="<?= $result; ?>">
                </div>
                <label for="result" class="col-2 form-label">Résultat</label><br>
            </div>
            <br>
            <div class="row">
                <button name="btn-ajouter" class="col-2 m-2 btn btn-primary">Ajouter</button>
                <button name="btn-soustraire" class="col-2 m-2 btn btn-primary">Soustraire</button>
                <button name="btn-multiplier" class="col-2 m-2 btn btn-primary">Multiplier</button>
                <button name="btn-diviser" class="col-2 m-2 btn btn-primary">Diviser</button>
            </div>
        </form>
    </div>
</body>

</html>
