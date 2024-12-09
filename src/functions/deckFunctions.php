<?php // src/functions/deckFunctions.php
function isCardInUserCards($userId, $cardId)
{
    if (empty($userId) || empty($cardId)) {
        return false; // Si les paramètres sont vides, retourner false
    }

    include '../../view/bdd.php';  // Inclure le fichier de connexion à la base de données

    // S'assurer que les IDs sont bien des entiers
    if (!is_int($userId) || !is_int($cardId)) {
        return false;
    }

    // Requête SQL pour vérifier la présence de la carte dans la table UserCards
    $sql = 'SELECT COUNT(*) FROM UserCards WHERE user_id = :userId AND card_id = :cardId';

    // Préparation de la requête
    $stmt = $pdo->prepare($sql);

    // Lier les paramètres
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':cardId', $cardId, PDO::PARAM_INT);

    // Exécution de la requête
    if ($stmt->execute()) {
        // Récupération du résultat sous forme d'objet
        $count = $stmt->fetch(PDO::FETCH_ASSOC);

        // Si le nombre de résultats est supérieur à 0, la carte est déjà associée
        return isset($count['COUNT(*)']) && $count['COUNT(*)'] > 0;
    } else {
        // Si l'exécution échoue, afficher l'erreur
        $errorInfo = $stmt->errorInfo();
        echo "Erreur d'exécution : " . $errorInfo[2];
        return false;
    }
}

function addCardToUserCards($userId, $cardId)
{
    include '../../view/bdd.php';
    if (!isCardInUserCards($userId, $cardId)) {
        $sql = 'INSERT INTO UserCards (user_id, card_id) VALUES (:userId, :cardId)';
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':cardId', $cardId, PDO::PARAM_INT);
        return $stmt->execute();
    } else {
        return false; // L'utilisateur ne possède pas cette carte
    }
}

function removeCardFromUserCards($userId, $cardId)
{
    include '../../view/bdd.php';
    $sql = 'DELETE FROM UserCards WHERE user_id = :userId AND card_id = :cardId';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->bindParam(':cardId', $cardId, PDO::PARAM_INT);
    return $stmt->execute();
}
