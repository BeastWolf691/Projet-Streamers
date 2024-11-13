<?php
include '../bdd.php';
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    try {
        // Préparer et exécuter la requête pour supprimer l'élément
        $stmt = $pdo->prepare('DELETE FROM stream WHERE id = 78');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header('Location: index.php'); 
            exit;
        } else {
            echo "Erreur lors de la suppression de l'élément.";
        }
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage();
    }
} else {
    echo "ID manquant.";
}
?>