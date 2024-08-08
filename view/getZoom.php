<?php
/*
include 'bdd.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = 'SELECT nickname, mainCat, thematic, picture, name, age, country, language, pYoutube, ptwitch, pKick, pTwitter, pInstagram, pTiktok, videoOne, videoTwo, factOne, factTwo, factThree FROM cards WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $card = $stmt->fetch(PDO::FETCH_OBJ);

    if ($card) {
        echo json_encode($card);
    } else {
        echo json_encode(['error' => 'Card not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
*/
?>

<?php
// getZoom.php

header('Content-Type: application/json');

if (!isset($_POST['id'])) {
    echo json_encode(['error' => 'ID is missing']);
    exit;
}

$id = $_POST['id'];

// Connexion à la base de données
include 'bdd.php';

$sql = 'SELECT nickname, mainCat, picture, name, birthdate, language, videoOne, videoTwo, factOne, factTwo, factThree FROM cards WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    echo json_encode(['error' => 'No data found']);
    exit;
}

// Calculer l'âge si nécessaire
/*if (!empty($data['birthdate'])) {
    $now = new DateTime();
    $data['age'] = $now->diff($birthdate)->y;
}*/

echo json_encode($data);
?>