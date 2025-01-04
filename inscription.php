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

// Insertion des données dans la base de données
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les valeurs envoyées par le formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cne=$_POST['cne'];
    $annee_bac = $_POST['annee_bac'];
    $revenu = $_POST['revenu'];
    $date_de_naissance = $_POST['birthDate'];  // Récupération de la date de naissance

    // Préparer la requête d'insertion avec la date de naissance
    $query = "INSERT INTO etudiants (nom, prenom,cne, annee_bac, revenu, date_de_naissance) 
              VALUES (:nom, :prenom, :cne ,:annee_bac, :revenu, :date_de_naissance)";
    $stmt = $pdo->prepare($query);
    
    // Lier les valeurs
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':cne', $cne);
    $stmt->bindParam(':annee_bac', $annee_bac);
    $stmt->bindParam(':revenu', $revenu);
    $stmt->bindParam(':date_de_naissance', $date_de_naissance);  // Lier la date de naissance

    // Exécuter la requête
    if ($stmt->execute()) {
        // Redirection avec un message de succès
        header('Location: index.php');
        exit();
    } else {
        echo "Erreur lors de l'ajout de l'étudiant.";
    }
}
?>
