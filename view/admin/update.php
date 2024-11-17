<?php
include '../bdd.php';
// Lecture des données envoyées en JSON
$data = json_decode(file_get_contents('php://input'), true);

// Vérification des données reçues
if (!isset($data['cardId']) || empty($data['cardId'])) {
    echo json_encode(["success" => false, "message" => "L'ID de la carte est obligatoire."]);
    exit;
}

$cardId = $data['cardId'];

file_put_contents('debug_log.txt', "Données reçues :\n" . print_r($data, true), FILE_APPEND);

try {
    // Requête de mise à jour
    $stmt = $pdo->prepare("
        UPDATE cards 
        SET nickname = :nickname,
            mainCat = :mainCat,
            secondCat = :secondCat,
            thematic = :thematic,
            name = :name,
            language = :languages,
            pYoutube = :pYoutube,
            pTwitch = :pTwitch,
            pKick = :pKick,
            pTwitter = :pTwitter,
            pInstagram = :pInstagram,
            pTiktok = :pTiktok,
            factOne = :factOne,
            factTwo = :factTwo,
            factThree = :factThree
        WHERE id = :cardId
    ");

    // Liaison des paramètres
    $stmt->execute([
        ':nickname' => $data['nickname'],
        ':mainCat' => $data['mainCat'],
        ':secondCat' => $data['secondCat'],
        ':thematic' => $data['thematic'],
        ':name' => $data['name'],
        ':languages' => $data['languages'],
        ':pYoutube' => $data['pYoutube'],
        ':pTwitch' => $data['pTwitch'],
        ':pKick' => $data['pKick'],
        ':pTwitter' => $data['pTwitter'],
        ':pInstagram' => $data['pInstagram'],
        ':pTiktok' => $data['pTiktok'],
        ':factOne' => $data['factOne'],
        ':factTwo' => $data['factTwo'],
        ':factThree' => $data['factThree']
    ]);

    echo json_encode(["success" => true, "message" => "Mise à jour réussie."]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Erreur lors de la mise à jour : " . $e->getMessage()]);
}
?>