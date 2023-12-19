<!-- Exercice 3 (Deuxième Partie, Première Version): -->
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
        <form action="contact_POST.php" method="post">
            <fieldset>
                <legend>Formulaire d'inscription</legend>
                <div class="row mb-3">
                    <label for="nom" class="form-label col-3">Nom</label>
                    <div class="col-7">
                        <input class="form-control" type="text" name="last_name" id="nom" placeholder="saisir votre nom">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="prenom" class="form-label col-3">Prénom</label>
                    <div class="col-7">
                        <input class="form-control" type="text" name="first_name" id="prenom" placeholder="saisir votre prenom">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="form-label col-3">Email</label>
                    <div class="col-7">
                        <input class="form-control" type="email" name="email" id="email" placeholder="saisir votre email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="form-label col-3">Sexe</label>
                    <div class="col-7 row">
                        <div class="col-5">
                            <label for="sexe_masc" class="form-check-label">Masculin</label>
                            <input class="form-check-input" type="radio" name="gender" id="sexe_masc" value="male">
                        </div>
                        <div class="col-5">
                            <label for="sexe_fem" class="form-check-label">Féminin</label>
                            <input class="form-check-input" type="radio" name="gender" id="sexe_fem" value="female">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pays" class="form-label col-3">Pays</label>
                    <div class="col-7">
                        <select name="country" id="pays" class="form-select">
                            <option value="maroc" selected>Maroc</option>
                            <option value="france">France</option>
                            <option value="espagne">Espagne</option>
                            <option value="kenya">Kenya</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="langages_prog" class="form-label col-3">Langages de programmation préférés</label>
                    <div class="col-7">
                        <select name="prog_languages[]" id="langages_prog" class="form-select" multiple>
                            <option value="java">Java</option>
                            <option value="c">C</option>
                            <option value="c++">C++</option>
                            <option value="php">PHP</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="form-label col-3">Domaines d'activité</label>
                    <div class="col-9 row">
                        <div class="col-4">
                            <input class="form-check-input" type="checkbox" name="activities[]" id="informatique" value="computer_science">
                            <label for="informatique" class="form-check-label">Informatique</label>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input" type="checkbox" name="activities[]" id="gestion" value="management">
                            <label for="gestion" class="form-check-label">Gestion</label>
                        </div>
                        <div class="col-3">
                            <input class="form-check-input" type="checkbox" name="activities[]" id="pedagogie" value="education">
                            <label for="pedagogie" class="form-check-label">Pédagogie</label>
                        </div>
                    </div>
                </div>
                <div>
                    <button name="send" class="btn btn-success">Envoyer</button>
                    <button name="clear" type="reset" class="btn btn-secondary">Vider</button>
                </div>
            </fieldset>
        </form>
        <br>
    </div>
</body>

</html>
