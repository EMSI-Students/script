<!-- Exercice 1: -->
<?php
$a = 1;
$b = 2;
$c = 5;
$max = $c;

if ($a > $b && $a > $c)
    $max = $a;
elseif ($b > $c)
    $max = $b;
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
    <p><?= $max; ?></p>
    <!-- ou bien -->
    <!-- <p><?php echo $max; ?></p> -->
</body>

</html>
