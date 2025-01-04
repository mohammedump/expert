<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> minhaty</title>
    <link rel="stylesheet" href="assetes/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
</head>
<body>
<?php include "topnav.php" ?>
<?php include "navbar.php" ?>
<div class="container d-flex justify-content-center align-items-center mt-5 min-vh-100 pb-5">
        <div class="col-md-6 shadow p-4 rounded bg-light">
            <h1 class="text-center mb-4"> Système de bourse </h1>
            <form action="verification.php" method="POST">
    <div class="mb-3">
        <label for="nom" class="form-label"><strong>Nom</strong></label>
        <input type="text" name="nom" id="nom" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="prenom" class="form-label"><strong>Prénom</strong></label>
        <input type="text" name="prenom" id="prenom" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="cne" class="form-label"><strong>CNE</strong></label>
        <input type="text" name="cne" id="cne" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="annee_bac" class="form-label"><strong>Année du Baccalauréat</strong></label>
        <input type="number" name="annee_bac" id="annee_bac" class="form-control" min="2000" max="2100" required>
    </div>
    <div class="mb-3">
        <label for="choix_cycle" class="form-label"><strong>Choix du cycle</strong></label>
        <select name="choix_cycle" class="form-select" required>
            <option value="" disabled selected>-- Sélectionnez un cycle --</option>
            <option value="cycle_licence">Cycle Licence</option>
            <option value="cycle_master">Cycle Master</option>
            <option value="cycle_doctorat">Cycle Doctorat</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary w-100">Vérifier l'éligibilité</button>
</form>


</div>



            
                
               
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
