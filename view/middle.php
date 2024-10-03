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
      ptwitch, pKick, pTwitter, pInstagram, pTiktok, videoOne, videoTwo, factOne, factTwo, factThree, birthdate FROM cards ORDER BY nickname ASC';
        $req = $pdo->query($sql);
        include 'flags.php';
        while ($d = $req->fetch(PDO::FETCH_OBJ)) { // pour chaque ligne dans la BDD, on crée une carte

            $flagIcon = getFlagIcon($d->language);
            // Pour chaque valeur de mainCat et de thematic, j'applique un css différent
            $mainCat = $d->mainCat;

            // Remplacement des espaces et caractères spéciaux pour créer une classe CSS valide
            $cssClass = 'cat_' . strtolower(str_replace([' ', '-', ','], '_', $mainCat));
            $mainCat = strtolower($d->nickname . ' ' . $d->mainCat . ' ' . $d->thematic . ' ' . $d->language);

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
            <div class="card <?php echo $cssClass; ?>" data-id="<?php echo $d->id; ?>"
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
                    <a class="cardUrl cardYoutube <?php echo $youtubeUrl ? '' : 'disabled'; ?>" href="<?php echo $youtubeUrl ?: '#'; ?>" target="_blank"><img src="./picture/icons/icon-youtube.svg" alt="YouTube" /></a>
                    <a class="cardUrl cardTwitch <?php echo $twitchUrl ? '' : 'disabled'; ?>" href="<?php echo $twitchUrl ?: '#'; ?>" target="_blank"><img src="./picture/icons/icon-twitch.svg" alt="Twitch" /></a>
                    <a class="cardUrl cardKick <?php echo $kickUrl ? '' : 'disabled'; ?>" href="<?php echo $kickUrl ?: '#'; ?>" target="_blank"><img src="./picture/icons/icon-kick.svg" alt="Kick" /></a>
                    <a class="cardUrl cardX <?php echo $twitterUrl ? '' : 'disabled'; ?>" href="<?php echo $twitterUrl ?: '#'; ?>" target="_blank"><img src="./picture/icons/icon-x.svg" alt="X" /></a>
                    <a class="cardUrl cardInstagram <?php echo $instagramUrl ? '' : 'disabled'; ?>" href="<?php echo $instagramUrl ?: '#'; ?>" target="_blank"><img src="./picture/icons/icon-instagram.svg" alt="Instagram" /></a>
                    <a class="cardUrl cardTiktok <?php echo $tiktokUrl ? '' : 'disabled'; ?>" href="<?php echo $tiktokUrl ?: '#'; ?>" target="_blank"><img src="./picture/icons/icon-tiktok.svg" alt="TikTok" /></a>
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

                <p> <?php echo $d->thematic; ?></p>
                
            </div>

            <i class="fa-solid fa-magnifying-glass">
                <a href="zoomCard.php?id=<?php echo $d->id; ?>" class="view-details"></a>
            </i>

            <i class="fa-sharp-duotone fa-solid fa-plus"></i>
        <?php } ?>
    </div>
</div>