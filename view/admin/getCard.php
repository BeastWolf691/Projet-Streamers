<?php
include '../bdd.php';
//affichage des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$id = $_GET['id'];
$query = $bdd->prepare("SELECT nickname, factone, facttwo, factthree FROM cards WHERE id = :id");
$query->bindParam(':id', $id, PDO::PARAM_INT);
$query->execute();

$data = $query->fetch(PDO::FETCH_ASSOC);

// Envoyer la réponse JSON
header('Content-Type: application/json');
if ($data) {
    echo json_encode($data);
} else {
    echo json_encode(['error' => 'Carte introuvable']);
}
?>
