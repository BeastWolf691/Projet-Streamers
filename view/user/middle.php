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

                <label for="name">Prénom</label>
                <input type="text" name="name" id="name">

                <label for="language">Langue </label>
                <input type="text" name="language" id="language">

                <div class="form-group">
                    <label for="pYoutube">Pseudo YouTube</label>
                    <div style="display: flex; align-items: center;">
                        <span style="margin-right: 5px;">https://www.youtube.com/@</span>
                        <input type="text" id="pYoutube" name="pYoutube" placeholder="Entrez le pseudo" value="<?= htmlspecialchars($pseudoYoutube ?? '') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pTwich">Pseudo Twitch</label>
                    <div style="display: flex; align-items: center;">
                        <span style="margin-right: 5px;">https://www.twitch.tv/</span>
                        <input type="text" id="pTwitch" name="pTwitch" placeholder="Entrez le pseudo" value="<?= htmlspecialchars($pseudoYoutube ?? '') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pKick">Pseudo Kick</label>
                    <div style="display: flex; align-items: center;">
                        <span style="margin-right: 5px;">https://www.kick.com/</span>
                        <input type="text" id="pKick" name="pKick" placeholder="Entrez le pseudo" value="<?= htmlspecialchars($pseudoYoutube ?? '') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pTwitter">Pseudo Twitter</label>
                    <div style="display: flex; align-items: center;">
                        <span style="margin-right: 5px;">https://www.twitter.com/</span>
                        <input type="text" id="pTwitter" name="pTwitter" placeholder="Entrez le pseudo" value="<?= htmlspecialchars($pseudoYoutube ?? '') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pInstagram">Pseudo Instagram</label>
                    <div style="display: flex; align-items: center;">
                        <span style="margin-right: 5px;">https://www.instagram.com/</span>
                        <input type="text" id="pInstagram" name="pInstagram" placeholder="Entrez le pseudo" value="<?= htmlspecialchars($pseudoYoutube ?? '') ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pTiktok">Pseudo Tiktok</label>
                    <div style="display: flex; align-items: center;">
                        <span style="margin-right: 5px;">https://www.tiktok.com/@</span>
                        <input type="text" id="pTiktok" name="pTiktok" placeholder="Entrez le pseudo" value="<?= htmlspecialchars($pseudoYoutube ?? '') ?>">
                    </div>
                </div>

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
        if (basename($_SERVER['SCRIPT_NAME']) === 'index.php' && strpos($_SERVER['PHP_SELF'], 'admin') !== false): ?>
            <a href="../admin/addCard.php">
                <button class="create-button" style="background-color: blue;">
                    Créer une carte
                    <i class="fa-solid fa-circle-plus"></i>
                </button></a>
        <?php endif; ?>
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

        include '../../src/functions/getIconForCategory.php';
        require_once '../../src/functions/deckFunctions.php';

        while ($d = $req->fetch(PDO::FETCH_OBJ)) { 

            include_once '../../src/functions/getColorForCategory.php';
            $pseudoYoutube = $d->pYoutube;
            $pseudoTwitch = $d->ptwitch;
            $pseudoKick = $d->pKick;
            $pseudoTwitter = $d->pTwitter;
            $pseudoInstagram = $d->pInstagram;
            $pseudoTiktok = $d->pTiktok;
            $youtubeUrl = $pseudoYoutube;
            $twitchUrl = $pseudoTwitch;
            $kickUrl = $pseudoKick;
            $twitterUrl = $pseudoTwitter;
            $instagramUrl = $pseudoInstagram;
            $tiktokUrl = $pseudoTiktok;

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
                <!-- vérifier si picture contient une image, si cela n'est pas le cas alors image par défaut undefined-->
                <img
                    class="cardPicture"
                    src="<?= !empty($d->picture) ? htmlspecialchars($d->picture) : '../picture/photos/photo-alt.jpg'; ?>"
                    alt="image de <?= htmlspecialchars($d->nickname); ?>">

                <div class="cardInfoRow cardInfoUrl">
                    <?php if ($youtubeUrl): ?>
                        <a href="<?php echo "https://www.youtube.com/@{$pseudoYoutube}"; ?>" target="_blank" class="cardUrl cardYoutube">
                            <img src="../picture/icons/icon-youtube.svg" alt="YouTube" />
                        </a>
                    <?php endif; ?>
                    <?php if ($twitchUrl): ?>
                        <a href="<?php echo "https://www.twitch.tv/{$pseudoTwitch}"; ?>" target="_blank" class="cardUrl cardTwitch">
                            <img src="../picture/icons/icon-twitch.svg" alt="Twitch" />
                        </a>
                    <?php endif; ?>

                    <?php if ($kickUrl): ?>
                        <a href="<?php echo "https://www.kick.com/{$pseudoKick}"; ?>" target="_blank" class="cardUrl cardKick">
                            <img src="../picture/icons/icon-kick.svg" alt="Kick" />
                        </a>
                    <?php endif; ?>

                    <?php if ($twitterUrl): ?>
                        <a href="<?php echo "https://www.twitter.com/{$pseudoTwitter}"; ?>" target="_blank" class="cardUrl cardX">
                            <img src="../picture/icons/icon-x.svg" alt="Twitter" />
                        </a>
                    <?php endif; ?>

                    <?php if ($instagramUrl): ?>
                        <a href="<?php echo "https://www.instagram.com/{$pseudoInstagram}"; ?>" target="_blank" class="cardUrl cardInstagram">
                            <img src="../picture/icons/icon-instagram.svg" alt="Instagram" />
                        </a>
                    <?php endif; ?>

                    <?php if ($tiktokUrl): ?>
                        <a href="<?php echo "https://www.tiktok.com/@{$pseudoTiktok}"; ?>" target="_blank" class="cardUrl cardTiktok">
                            <img src="../picture/icons/icon-tiktok.svg" alt="Tiktok" />
                        </a>
                    <?php endif; ?>
                </div>


                <div class="cardInfoRow cardInfoPersonal">
                    <div class="cardAge">
                        <?php echo $age; ?> ans
                    </div>
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

                    <div class="deckButton <?php echo isCardInUserCards($d->id, $pdo) ? 'added' : ''; ?>" data-id="<?php echo $d->id; ?>">
                        <?php if (isCardInUserCards($d->id, $pdo)): ?>
                            <!-- Image pour "Enlever du deck" -->
                            <img src="../picture/icons/icon-cat-gaming.svg" alt="Enlever du deck" />
                            <p>Enlever du deck</p>
                        <?php else: ?>
                            <!-- Image pour "Ajouter au deck" -->
                            <img src="../picture/icons/icon-deck.png" alt="Ajouter au deck" />
                            <p>Deck</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>