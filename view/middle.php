<div id="middle">
    <aside class="filter-bar">
        <?php include "filter.php";
        ?>

    </aside>

    <aside class="result">
        <?php include 'zoomCard.php' ?>
    </aside>

    <div class="content">
        <!-- récupération -->
        <?php

        $sql = 'SELECT id, nickname, mainCat, secondCat,thematic, picture, name, language, pYoutube,
      ptwitch, pKick, pTwitter, pInstagram, pTiktok, factOne, factTwo, factThree, birthdate FROM cards ORDER BY nickname ASC';
        $req = $pdo->query($sql);
        include 'flags.php';
        while ($d = $req->fetch(PDO::FETCH_OBJ)) { // pour chaque ligne dans la BDD, on crée une carte

            $flagIcon = getFlagIcon($d->language);

            // Application d'un CSS spécifique pour chaque valeur de mainCat 
            $mainCat = strtolower($d->mainCat);
            $backgroundColor = '';
            switch ($mainCat) {
                case 'gaming':
                    $backgroundColor = '#ff8970'; 
                    break;
                case 'formation':
                    $backgroundColor = '#5f0404'; 
                    break;
                case 'actualités':
                    $backgroundColor = '#9FF0F7'; 
                    break;
                case 'irl':
                    $backgroundColor = ' #47af21'; 
                    break;
                case 'react':
                    $backgroundColor = ' #462e79'; 
                    break;
                  
            }
            //asupprimert
            $inlineStyle = '';
            if (!empty($backgroundColor)) {
                $inlineStyle = 'background-color: ' . $backgroundColor . ';';
            }

            //lien généré pour les réseaux sociaux
            $pseudoYoutube = $d->pYoutube;
            $pseudoTwitch = $d->ptwitch;
            $pseudoKick = $d->pKick;
            $pseudoTwitter = $d->pTwitter;
            $pseudoInstagram = $d->pInstagram;
            $pseudoTiktok = $d->pTiktok;

            $youtubeUrl = !empty($pseudoYoutube) ? "https://www.youtube.com/@{$pseudoYoutube}" : null;
            $twitchUrl = !empty($pseudoTwitch) ? "https://www.twitch.tv/{$pseudoTwitch}" : null;
            $kickUrl = !empty($pseudoKick) ? "https://www.kick.com/{$pseudoKick}" : null;
            $twitterUrl = !empty($pseudoTwitter) ? "https://www.twitter.com/{$pseudoTwitter}" : null;
            $instagramUrl = !empty($pseudoInstagram) ? "https://www.instagram.com/{$pseudoInstagram}" : null;
            $tiktokUrl = !empty($pseudoTiktok) ? "https://www.tiktok.com/{$pseudoTiktok}" : null;

            // Calcul de l'âge à partir de la date de naissance
            $birthdate = new DateTime($d->birthdate);
            $now = new DateTime();
            $age = $now->diff($birthdate)->y;
        ?>
            <div class="card "
                style="<?php echo $inlineStyle; ?>"
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
                </div>

                <!--echo !empty($d->picture) ? $d->picture cela sert à vérifier si picture contient une image, 
                si cela n'est pas le cas alors image par défaut undefined-->
                <img
                    class="cardPicture"
                    src="picture/photos/photo-<?php echo !empty($d->picture) ? $d->picture : 'undefined' ?>.jpg"
                    alt="<?php echo $d->nickname; ?>"
                    title="<?php echo $d->nickname; ?>" />

                <!------Réseaux Sociaux ------->
                <div class="cardInfoRow cardInfoUrl">
                    <?php if ($youtubeUrl): ?>
                        <a href="<?php echo $youtubeUrl; ?>" target="_blank" class="cardUrl cardYoutube">
                            <img src="./picture/icons/icon-youtube.svg" alt="YouTube" />
                        </a>
                    <?php endif; ?>
                    <?php if ($twitchUrl): ?>
                        <a href="<?php echo $twitchUrl; ?>" target="_blank" class="cardUrl cardTwitch">
                            <img src="./picture/icons/icon-twitch.svg" alt="Twitch" />
                        </a>
                    <?php endif; ?>

                    <?php if ($kickUrl): ?>
                        <a href="<?php echo $kickUrl; ?>" target="_blank" class="cardUrl cardKick">
                            <img src="./picture/icons/icon-kick.svg" alt="Kick" />
                        </a>
                    <?php endif; ?>

                    <?php if ($twitterUrl): ?>
                        <a href="<?php echo $twitterUrl; ?>" target="_blank" class="cardUrl cardX">
                            <img src="./picture/icons/icon-x.svg" alt="Twitter" />
                        </a>
                    <?php endif; ?>

                    <?php if ($instagramUrl): ?>
                        <a href="<?php echo $instagramUrl; ?>" target="_blank" class="cardUrl cardInstagram">
                            <img src="./picture/icons/icon-instagram.svg" alt="Instagram" />
                        </a>
                    <?php endif; ?>

                    <?php if ($tiktokUrl): ?>
                        <a href="<?php echo $tiktokUrl; ?>" target="_blank" class="cardUrl cardTiktok">
                            <img src="./picture/icons/icon-tiktok.svg" alt="Tiktok" />
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
                    <div class="cardMainCat">
                        <!-- Ajouter dans la balise de div : [[ style="[php] $d->mainCat = $mainCat; getBckdColor(catRow, $mainCat)[?>]" ]] lorsque la fonction aura été créée -->
                        <?php echo $d->mainCat; ?>
                    </div>
                    <div class="cardSecondCat">
                        <!-- Ajouter dans la balise de div : [[ style="[php] $d->secondCat = $secCat; getBckdColor(catRow, $secCat)[?>]" ]] lorsque la fonction aura été créée -->
                        <?php echo $d->secondCat; ?>
                    </div>
                </div>

                <div class="cardTheme">
                    <?php echo $d->thematic; ?>
                </div>

                <div class="cardActions">
                    <div class="zoomButton">
                        <img src="./picture/icons/icon-zoom.svg" alt="Zoom sur la carte" />
                        <p>Zoom
                        <p>
                    </div>

                    <div class="deckButton">
                        <img src="./picture/icons/icon-deck.png" alt="Ajouter au deck" />
                        <p>Deck
                        <p>
                    </div>
                </div>
            </div>


        <?php } ?>
    </div><!--  -->
</div>