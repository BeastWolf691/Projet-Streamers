<div id="middle">
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

                <input type="hidden" name="cardId" id="cardId">

                <label for="nickname">Pseudo</label>
                <input type="text" name="nickname" id="nickname">

                <label for="mainCat">Catégorie principale</label>
                <input type="text" name="mainCat" id="mainCat">

                <label for="secondCat">Catégorie secondaire</label>
                <input type="text" name="secondCat" id="secondCat">

                <label for="thematic">thème</label><br>
                <input type="text" name="thematic" id="thematic"><br>
                <!-- 
                <label for="picture">Photo</label><br>
                <input type="file" name="picture" id="picture"><br> -->

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

    <aside class="filter-bar">
        <?php include "filter.php"; ?>
        <?php
        // Vérifie si le script appelant est 'admin/index.php'
        if (basename($_SERVER['SCRIPT_NAME']) === 'index.php' && strpos($_SERVER['PHP_SELF'], 'admin') !== false): ?>

            <button class="create-button" style="background-color: blue;">
                <i class="fa-solid fa-circle-plus"></i>
            </button>
        <?php endif; ?>
        <div class="create-modal" id="create-modal">
            <div class="create-modal-content">
                <div class="close-create-button">x</div>
                <?php
                include '../admin/addCard.php'
                ?>
            </div>
        </div>
    </aside>
    <aside class="result">
        
        <p class="zoom">Toi aussi fais ton deck<br>Clique sur Zoom pour afficher une carte</p>
        <?php include 'zoomCard.php' ?>
    </aside>
    <div class="content">
        <?php
        $sql = 'SELECT id, nickname, mainCat, secondCat,thematic, picture, name, language, pYoutube,
        ptwitch, pKick, pTwitter, pInstagram, pTiktok, factOne, factTwo, factThree, birthdate FROM cards ORDER BY nickname ASC';
        $req = $pdo->query($sql);

        // include 'flags.php';
        include '../../src/functions/getIconForCategory.php';

        while ($d = $req->fetch(PDO::FETCH_OBJ)) { // pour chaque ligne dans la BDD, on crée une carte
            // $flagIcon = getFlagIcon($d->language);
            // Application d'un CSS spécifique pour chaque valeur de mainCat et de thematic
            include_once '../../src/functions/getColorForCategory.php';
            //lien généré pour les réseaux sociaux
            $pseudoYoutube = $d->pYoutube;
            $pseudoTwitch = $d->ptwitch;
            $pseudoKick = $d->pKick;
            $pseudoTwitter = $d->pTwitter;
            $pseudoInstagram = $d->pInstagram;
            $pseudoTiktok = $d->pTiktok;
            $youtubeUrl = !empty($pseudoYoutube) ? "https://www.youtube.com/@{$pseudoYoutube}" : '';
            $twitchUrl = !empty($pseudoTwitch) ? "https://www.twitch.tv/{$pseudoTwitch}" : '';
            $kickUrl = !empty($pseudoKick) ? "https://www.kick.com/{$pseudoKick}" : '';
            $twitterUrl = !empty($pseudoTwitter) ? "https://www.twitter.com/{$pseudoTwitter}" : '';
            $instagramUrl = !empty($pseudoInstagram) ? "https://www.instagram.com/{$pseudoInstagram}" : '';
            $tiktokUrl = !empty($pseudoTiktok) ? "https://www.tiktok.com/@{$pseudoTiktok}" : '';

            // Calcul de l'âge à partir de la date de naissance
            $birthdate = new DateTime($d->birthdate);
            $now = new DateTime();
            $age = $now->diff($birthdate)->y;
        ?>
            <div class="card"
                data-id="<?php echo $d->id; ?>"
                data-nickname="<?php echo $d->nickname; ?>"
                data-info="<?php echo $d->mainCat; ?>"
                data-second="<?php echo $d->secondCat; ?>"
                data-thematic="<?php echo strtolower($d->thematic); ?>"
                data-age="<?php echo $age; ?>"
                data-picture="<?php echo !empty($d->picture) ? $d->picture : 'undefined'; ?>"
                data-name="<?php echo $d->name; ?>"
                data-languages="<?php echo $d->language; ?>"
                data-pyoutube="<?php echo $youtubeUrl; ?>"
                data-ptwitch="<?php echo $twitchUrl; ?>"
                data-pkick="<?php echo $kickUrl; ?>"
                data-ptwitter="<?php echo $twitterUrl; ?>"
                data-pinstagram="<?php echo $instagramUrl; ?>"
                data-ptiktok="<?php echo $tiktokUrl; ?>"
                data-factone="<?php echo $d->factOne; ?>"
                data-facttwo="<?php echo $d->factTwo; ?>"
                data-factthree="<?php echo $d->factThree; ?>">

                <div class="cardHeader">
                    <?php echo $d->nickname; ?>
                    <div class="cardCatIcon" style="background-color:<?php echo getColorForCategory($d->mainCat); ?>;">
                        <img src="../picture/icons/icon-cat-<?php echo getIconForCategory($d->mainCat); ?>.svg" alt="<?php echo $d->mainCat; ?>" />
                    </div>

                    <?php
                    // Vérifie si le script appelant est 'admin/index.php'
                    if (basename($_SERVER['SCRIPT_NAME']) === 'index.php' && strpos($_SERVER['PHP_SELF'], 'admin') !== false): ?>
                        <button class="edit-button" style="background-color: green;" data-id="<?php echo $d->id; ?>">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="delete-button" style="background-color: red;" data-id="<?php echo $d->id; ?>">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>

                    <?php endif; ?>

                </div>
                <!--echo !empty($d->picture) ? $d->picture cela sert à vérifier si picture contient une image, 
                si cela n'est pas le cas alors image par défaut undefined-->
                <img
                    class="cardPicture"
                    src="<?= !empty($d->picture) ? htmlspecialchars($d->picture) : '../picture/photos/photo-alt.jpg'; ?>"
                    alt="image de <?= htmlspecialchars($d->nickname); ?>">
                <!------Réseaux Sociaux ------->
                <div class="cardInfoRow cardInfoUrl">
                    <?php if ($youtubeUrl): ?>
                        <a href="<?php echo $youtubeUrl; ?>" target="_blank" class="cardUrl cardYoutube">
                            <img src="../picture/icons/icon-youtube.svg" alt="YouTube" />
                        </a>
                    <?php endif; ?>
                    <?php if ($twitchUrl): ?>
                        <a href="<?php echo $twitchUrl; ?>" target="_blank" class="cardUrl cardTwitch">
                            <img src="../picture/icons/icon-twitch.svg" alt="Twitch" />
                        </a>
                    <?php endif; ?>

                    <?php if ($kickUrl): ?>
                        <a href="<?php echo $kickUrl; ?>" target="_blank" class="cardUrl cardKick">
                            <img src="../picture/icons/icon-kick.svg" alt="Kick" />
                        </a>
                    <?php endif; ?>

                    <?php if ($twitterUrl): ?>
                        <a href="<?php echo $twitterUrl; ?>" target="_blank" class="cardUrl cardX">
                            <img src="../picture/icons/icon-x.svg" alt="Twitter" />
                        </a>
                    <?php endif; ?>

                    <?php if ($instagramUrl): ?>
                        <a href="<?php echo $instagramUrl; ?>" target="_blank" class="cardUrl cardInstagram">
                            <img src="../picture/icons/icon-instagram.svg" alt="Instagram" />
                        </a>
                    <?php endif; ?>

                    <?php if ($tiktokUrl): ?>
                        <a href="<?php echo $tiktokUrl; ?>" target="_blank" class="cardUrl cardTiktok">
                            <img src="../picture/icons/icon-tiktok.svg" alt="Tiktok" />
                        </a>
                    <?php endif; ?>
                </div>


                <div class="cardInfoRow cardInfoPersonal">
                    <div class="cardAge">
                        <?php echo $age; ?> ans
                    </div>
                    <!-- <div class="cardCountry">
                        <i class="flag-icon flag-icon-<?php echo $flagIcon; ?>"></i>
                    </div> -->
                    <div class="cardLanguage">
                        <?php echo $d->language; ?>
                    </div>
                </div>

                <div class="cardCatRow">
                    <div class="cirlLeft" style="background-color:<?php echo getColorForCategory($d->mainCat); ?>;"></div>
                    <div class="cardMainCat">
                        <?php echo htmlspecialchars($d->mainCat); ?>
                    </div>
                    <div class="cirlRight" style="background-color:<?php echo getColorForCategory($d->secondCat); ?>;"></div>
                    <div class="cardSecondCat">
                        <?php echo htmlspecialchars($d->secondCat); ?>
                    </div>
                </div>

                <div class="cardTheme">
                    <?php echo $d->thematic; ?>
                </div>

                <div class="cardActions">
                    <div class="zoomButton">
                        <img src="../picture/icons/icon-zoom.svg" alt="Zoom sur la carte" />
                        <p>Zoom
                        <p>
                    </div>

                    <div class="deckButton">
                        <img src="../picture/icons/icon-deck.png" alt="Ajouter au deck" />
                        <p>Deck
                        <p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>