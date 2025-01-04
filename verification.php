<?php
$host = 'localhost';
$dbname = 'minhaty';
$username = 'root';
$password = '';

try {
    // Créer une connexion PDO à la base de données
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cne = $_POST['cne'];
    $annee_bac = $_POST['annee_bac'];
    $choix_cycle = $_POST['choix_cycle'];

    // Vérification de l'éligibilité à la bourse en fonction des critères.
    // Exemple de logique de vérification
    $query = "SELECT * FROM etudiants WHERE cne = :cne AND annee_bac = :annee_bac";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':cne', $cne);
    $stmt->bindParam(':annee_bac', $annee_bac);
    $stmt->execute();

    $student = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($student) {
        // Calcul de l'âge à partir de la date de naissance
        $date_naissance = new DateTime($student['date_de_naissance']);
        $aujourdhui = new DateTime();
        $age = $date_naissance->diff($aujourdhui)->y;

        $revenus = $student['revenu']; // Revenus mensuels récupérés depuis la base de données
    
        // Logique d'éligibilité
        if ($age > 26) {
            $result = "Vous n'êtes pas éligible pour la bourse car votre âge est supérieur à 26 ans.";
        } elseif ($revenus > 5000) {
            $result = "Vous n'êtes pas éligible pour la bourse car vos revenus mensuels sont supérieurs à 5000.";
        } else {
            // Logique de vérification des cycles
            if ($choix_cycle == 'cycle_licence' && $student['annee_bac'] >= 2019) {
                $result = "Vous êtes éligible pour une bourse du cycle Licence.";
            } elseif ($choix_cycle == 'cycle_master' && $student['annee_bac'] >= 2015) {
                $result = "Vous êtes éligible pour une bourse du cycle Master.";
            } elseif ($choix_cycle == 'cycle_doctorat' && $student['annee_bac'] >= 2010) {
                $result = "Vous êtes éligible pour une bourse du cycle Doctorat.";
            } else {
                $result = "Vous n'êtes pas éligible pour ce cycle.";
            }
        }
    } else {
        $result = "Étudiant non trouvé avec ce CNE et cette année du bac.";
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat de vérification</title>
    <link rel="stylesheet" href="assetes/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php include "topnav.php"; ?>
<?php include "navbar.php"; ?>
<div class="container d-flex justify-content-center align-items-center mt-5 min-vh-100 pb-5">
    <div class="col-md-6 shadow p-4 rounded bg-light">
        <h1 class="text-center mb-4">Vérification de l'éligibilité</h1>
        <div class="mt-3 alert alert-info">
            <?php echo htmlspecialchars($result); ?>
        </div>
        <a href="index.php" class="btn btn-primary w-100">Retour à la page d'accueil</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
