<?php
$last_name = $first_name = $email = null;
$gender = null;
$country = null;
$prog_languages = null;
$activities = null;
$erreurs = null;

// valeurs autorisées
$gender_options = [
    "male" => "Masculin",
    "female" => "Féminin"
];

$country_options = [
    "maroc" => "Maroc",
    "france" => "France",
    "espagne" => "Espagne",
    "kenya" => "Kenya"
];

$prog_language_options = [
    "java" => "Java",
    "c" => "C",
    "c++" => "C++",
    "php" => "PHP"
];

$activity_options = [
    "computer_science" => "Informatique",
    "management" => "Gestion",
    "education" => "Pédagogie"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collecte de données
    if (isset($_POST["first_name"])) {
        $first_name = htmlentities($_POST["first_name"]);
    }


    if (isset($_POST["last_name"])) {
        $last_name = htmlentities($_POST["last_name"]);
    }

    if (isset($_POST["email"])) {
        $email = filter_var(htmlentities($_POST["email"]), FILTER_SANITIZE_EMAIL);
    }

    if (isset($_POST["gender"])) {
        $gender = htmlentities($_POST["gender"]);
    }

    if (isset($_POST["country"])) {
        $country = htmlentities($_POST["country"]);
    }

    if (isset($_POST["prog_languages"])) {
        foreach ($_POST["prog_languages"] as $langage) {
            $prog_languages[] = htmlentities($langage);
        }
    }

    if (isset($_POST["activities"])) {
        foreach ($_POST["activities"] as $activity) {
            $activities[] = htmlentities($activity);
        }
    }


    // gestion des erreurs
    if (empty($first_name)) {
        $erreurs["first_name"] = "Veuillez indiquer votre prénom";
    }

    if (empty($last_name)) {
        $erreurs["last_name"] = "Veuillez indiquer votre nom";
    }

    if (empty($email)) {
        $erreurs["email"] = "Veuillez indiquer votre adresse e-mail";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreurs["email"] = "Veuillez indiquer un email valide";
    }

    if (empty($gender)) {
        $erreurs["gender"] = "Veuillez indiquer votre sexe";
    } elseif (!isset($gender_options[$gender])) {
        $erreurs["gender"] = "Option de sexe ($gender) non autorisée";
    } else {
        $gender = $gender_options[$gender];
    }

    if (empty($country)) {
        $erreurs["country"] = "Veuillez indiquer votre pays";
    } elseif (!isset($country_options[$country])) {
        $erreurs["country"] = "Option de pays ($country) non autorisée";
    } else {
        $country = $country_options[$country];
    }

    if (empty($prog_languages)) {
        $erreurs["prog_languages"] = "Veuillez indiquer vos langages de programmation préférés";
    } else {
        $erreur_msg = "";
        foreach ($prog_languages as $i => $prog_language) {
            if (!isset($prog_language_options[$prog_language])) {
                $erreur_msg .= "Option de langage de programmation ($prog_language) non autorisée<br>";
            } else {
                $prog_languages[$i] = $prog_language_options[$prog_language];
            }
        }

        if ($erreur_msg) {
            $erreurs["prog_languages"] = $erreur_msg;
        }
    }

    if (empty($activities)) {
        $erreurs["activities"] = "Veuillez indiquer vos domaines d'activité";
    } else {
        $erreur_msg = "";
        foreach ($activities as $i => $activity) {
            if (!isset($activity_options[$activity])) {
                $erreur_msg .= "Option de domaines d'activité ($activity) non autorisée<br>";
            } else {
                $activities[$i] = $activity_options[$activity];
            }
        }

        if ($erreur_msg) {
            $erreurs["activities"] = $erreur_msg;
        }
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>
            .keyword {
                font-weight: bold;
                font-size: 16px;
            }
        </style>
    </head>

    <body>
        <div class="container mt-3">

            <?php if (!$erreurs) {
            ?>
                Merci <span class="keyword"><?= "$first_name $last_name"; ?></span> pour votre inscription, vous avez renseigné les informations suivantes :
                <ul>
                    <li>Votre email est <span class="keyword"><?= $email; ?></span></li>
                    <li>Votre sexe est <span class="keyword"><?= $gender; ?></span></li>
                    <li>Votre pays est <span class="keyword"><?= $country; ?></span></li>
                    <li>Vos langages de programmation préférés sont :
                        <ul>
                            <?php
                            foreach ($prog_languages as $prog_language) {
                            ?>
                                <li><span class="keyword"><?= $prog_language; ?></span></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li>Vos domaines d'activité sont :</li>
                    <ul>
                        <?php
                        foreach ($activities as $activity) {
                        ?>
                            <li><span class="keyword"><?= $activity; ?></span></li>
                        <?php
                        }
                        ?>
                    </ul>
                </ul>

                <?php
            } else {
                foreach ($erreurs as $erreur) {
                ?>
                    <p class="alert alert-danger"><?= $erreur; ?></p>
            <?php
                }
            }
            ?>
        </div>
    </body>

    </html>
<?php
}
?>
