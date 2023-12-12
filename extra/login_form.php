<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Formulaire d'authentification</title>
</head>

<body>
    <?php
    $email = $password = $msg = null;
    $erreurs = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = filter_var(htmlentities($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $password = htmlentities($_POST["pass"]);

        if (empty($email)) {
            $erreurs["email"] = "Veuillez entrer votre email!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreurs["email"] = "Email invalide!";
        }

        if (empty($password)) {
            $erreurs["password"] = "Veuillez entrer votre mot de passe!";
        }

        if (!empty($email) && !empty($password)) {
            $msg = "email: $email <br> mot de passe: $password";
        }
    }
    ?>
    <!-- form:post>label{Email: }+input:email[name="email"]+br+label{Mot de passe: }+
    input:password[name="pass"]+br+button[name="connecter"]{Se connecter} -->
    <div class="container">
        <form action="" method="post">
            <label class="form-label" for="email_input">Email: </label>
            <input class="form-control <?= isset($erreurs["email"]) ? "is-invalid" : ""; ?>" type="email" name="email" id="email_input" value="<?= $email; ?>" required>
            <?php
            if (isset($erreurs["email"])) {
            ?>
                <span class="invalid-feedback"><?= $erreurs["email"]; ?></span>
            <?php
            }
            ?>
            <br>
            <label class="form-label" for="password_input">Mot de passe: </label>
            <input class="form-control <?= isset($erreurs["password"]) ? "is-invalid" : ""; ?>" type="password" name="pass" id="password_input" value="<?= $password; ?>" required>
            <?php
            if (isset($erreurs["password"])) {
            ?>
                <span class="invalid-feedback"><?= $erreurs["password"]; ?></span>
            <?php
            }
            ?>
            <br>
            <button class="btn btn-success" name="connecter">Se connecter</button>
        </form>
        <br>
        <?php
        if (!$erreurs && $msg) {
        ?>
            <p class="alert alert-success"><?= $msg; ?></p>
        <?php
        }
        ?>
    </div>
</body>

</html>
