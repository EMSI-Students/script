<!-- Exercice 1: -->
<?php
    $nom = $age = $msg = "";
    if (isset($_GET["envoyer"]) && isset($_GET["nom"]) && isset($_GET["age"])) {
        $nom = $_GET["nom"];
        $age = $_GET["age"];
        $msg = "Bienvenue $nom, vous avez $age ans";
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
        <?= $msg;?>
    </p>
</body>

</html>
