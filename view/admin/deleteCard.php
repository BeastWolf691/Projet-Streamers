<?php
include '../bdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = intval($_POST['id']); 

    try {
        $stmt = $pdo->prepare("DELETE FROM cards WHERE id = :id");
        $success = $stmt->execute(['id' => $id]);

        if ($success) {
            echo json_encode(['success' => true, 'message' => 'Carte supprimée avec succès']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Erreur lors de la suppression']);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur de base de données: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Requête invalide']);
}
?>