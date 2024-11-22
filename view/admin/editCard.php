<?php
include '../bdd.php';
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $sql = "UPDATE cards SET 
            nickname = :nickname,
            mainCat = :mainCat,
            secondCat = :secondCat,
            thematic = :thematic,
            name = :name,
            language = :language,
            pYoutube = :pYoutube,
            ptwitch = :pTwitch,
            pKick = :pKick,
            pTwitter = :pTwitter,
            pInstagram = :pInstagram,
            pTiktok = :pTiktok,
            factOne = :factOne,
            factTwo = :factTwo,
            factThree = :factThree,
            birthdate = :birthdate
            WHERE id = :id";

        $stmt = $pdo->prepare($sql);

        $result = $stmt->execute([ 
            'nickname' => $_POST['nickname'],
            'mainCat' => $_POST['mainCat'],
            'secondCat' => $_POST['secondCat'],
            'thematic' => $_POST['thematic'],
            'name' => $_POST['name'],
            'language' => $_POST['language'],
            'pYoutube' => $_POST['pYoutube'],
            'pTwitch' => $_POST['pTwitch'],
            'pKick' => $_POST['pKick'],
            'pTwitter' => $_POST['pTwitter'],
            'pInstagram' => $_POST['pInstagram'],
            'pTiktok' => $_POST['pTiktok'],
            'factOne' => $_POST['factOne'],
            'factTwo' => $_POST['factTwo'],
            'factThree' => $_POST['factThree'],
            'birthdate' => $_POST['birthdate'],
            'id' => $_POST['cardId']
        ]);

        echo json_encode(['success' => $result]);
    }
} catch(PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>