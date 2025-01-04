<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> minhaty </title>
    <link rel="stylesheet" href="assetes/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
</head>
<body>
<?php include "topnav.php" ?>
<?php include "navbar.php" ?>

<div class="container d-flex justify-content-center align-items-center mt-5 min-vh-100">
        <div class="col-md-6 shadow p-4 rounded bg-light">
            <h1 class="text-center mb-4">Inscription</h1>
            
            <form action="inscription.php" method="POST">
                <div class="mb-3">
                    <label for="nom" class="form-label"><strong>Nom</strong></label>
                    <input type="text" id="nom" name="nom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label"><strong>Prenom</strong></label>
                    <input type="text" id="nom" name="prenom" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nom" class="form-label"><strong>CNE</strong></label>
                    <input type="text" id="cne" name="cne" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="birthDate" class="form-label"><strong>Date de naissance</strong></label>
                    <input type="date" name="birthDate" id="birthDate" class="form-control" required>
                </div>

                <div class="mb-3">
                  <label for="annee_bac" class="form-label"><strong>Année du Baccalauréat</strong></label>
                  <input type="number" id="annee_bac" name="annee_bac" class="form-control" min="2000" max="2100" step="1" required>
                </div>


                <div class="mb-3">
                    <label for="moyenne" class="form-label"><strong>Revenu Mensuel Familial(dh)</strong></label>
                    <input type="number" step="0.1" id="moyenne" name="revenu" min="500" max="100000000000"class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Ajouter</button>
            </form>

            <?php
                if (isset($_GET['result'])) {
                    echo "<div id='result' class='mt-3 alert alert-info'>" . htmlspecialchars($_GET['result']) . "</div>";
                }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
