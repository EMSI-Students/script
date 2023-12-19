<!-- Exercice 2: (Deuxième Partie)-->
<?php
$first = $second = $result = 0;
$operation = "";
$is_error = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = $_POST["first"];
    $second = $_POST["second"];
    $operation = $_POST["operation"];

    switch ($operation) {
        case 'ajouter':
            $result = $first + $second;
            break;

        case 'soustraire':
            $result = $first - $second;
            break;

        case 'multiplier':
            $result = $first * $second;
            break;

        case 'diviser':
            if ($second == 0) {
                $result = "";
                $is_error = true;
                $error_msg = "Division par zéro est impossible";
            } else {
                $result = $first / $second;
            }
            break;
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
                <div class="col-2">
                    <input type="number" name="first" class="form-control" value="<?= $first; ?>">
                </div>
                <div class="col-3">
                    <select class="form-select" name="operation">
                        <option value="ajouter" <?= $operation == "ajouter" ? "selected" : ""; ?>>Ajouter</option>
                        <option value="soustraire" <?= $operation == "soustraire" ? "selected" : ""; ?>>Soustraire</option>
                        <option value="multiplier" <?= $operation == "multiplier" ? "selected" : ""; ?>>Multiplier</option>
                        <option value="diviser" <?= $operation == "diviser" ? "selected" : ""; ?>>Diviser</option>
                    </select>
                </div>
                <div class="col-2">
                    <input type="number" name="second" class="form-control <?= $is_error ? "is-invalid" : ""; ?>" value="<?= $second; ?>">
                </div>
                <div class="col-1">
                    <label class="form-label">=</label>
                </div>
                <div class="col-4">
                    <input type="text" name="result" id="result" disabled class="form-control" value="<?= $result; ?>">
                </div>
                <button name="btn-calculer" class="mt-3 btn btn-primary">Calculer</button>
            </div>
        </form>
        <br>

        <?php
        if ($is_error) {
        ?>
            <p class="alert alert-danger"><?= $error_msg; ?></p>
        <?php
        }
        ?>
    </div>
</body>

</html>
