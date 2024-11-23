<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $stmt = $pdo->prepare("SELECT * FROM cards WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $card = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($card) {
            echo json_encode($card);
        } else {
            echo json_encode(['error' => 'Carte non trouvée']);
        }
    }
    ?>
    <div class="edit-modal" id="edit-modal">
        <div class="edit-modal-content">
            <div class="close-button">x</div>
            <form action="" id="editCardForm" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                <h2 style="text-align: center"> - Modification d'une Carte - </h2>

                <label for="nickname">Pseudo</label>
                <input type="text" name="nickname" id="nickname">

                <label for="mainCat">Catégorie principale</label>
                <input type="text" name="mainCat" id="mainCat">

                <label for="secondCat">Catégorie secondaire</label>
                <input type="text" name="secondCat" id="secondCat">

                <label for="thematics">thème</label><br>
                <input type="text" name="thematics" id="thematics"><br>

                <!-- <label for="picture">Photo</label><br>
                <input type="file" name="picture" id="picture"><br>
  -->
                <label for="name">Prénom</label>
                <input type="text" name="name" id="name">

                <label for="language">Langue </label>
                <input type="text" name="language" id="language">

                <label for="pYoutube">Pseudo YouTube</label>
                <input type="text" name="pYoutube" id="pYoutube">

                <label for="pTwitch">Pseudo Twitch</label>
                <input type="text" name="pTwitch" id="pTwitch">

                <label for="pKick">Pseudo Kick</label>
                <input type="text" name="pKick" id="pKick">

                <label for="pTwitter">Pseudo Twitter</label>
                <input type="text" name="pTwitter" id="pTwitter">

                <label for="pInstagram">Pseudo Instagram</label>
                <input type="text" name="pInstagram" id="pInstagram">

                <label for="pTiktok">Pseudo Tiktok</label>
                <input type="text" name="pTiktok" id="pTiktok">

                <label for="factOne">Fait 1</label>
                <input type="text" name="factOne" id="factOne">

                <label for="factTwo">Fait 2</label>
                <input type="text" name="factTwo" id="factTwo">

                <label for="factThree">Fait 3</label>
                <input type="text" name="factThree" id="factThree">

                <label for="birthdate">Anniversaire</label>
                <input type="date" name="birthdate" id="birthdate">

                <input type="submit" value="Modifier">

            </form>
        </div>
    </div>