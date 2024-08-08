<link rel="stylesheet" media="screen and (min-width: 981px)" href="../css/desk/zoom-card.css" />

<?php

$nickname = "Antoine Daniel";
$mainCat = "Gaming";
$picture = "antoinedaniel";
$name = "Antoine Daniel";
$age = "35";
$country = "France";
$language = "Français";
$factOne = "Antoine Daniel s'est rendu célèbre pour sa série de vidéos YouTube « What The Cut ».";
$factTwo = "Il a arrêté de produire pour YouTube afin de débuter les lives Twitch, sans avoir sorti un épisode 48 de WTC...";
$factThree = "Il fait partie de « l'équipe du Lundi » sur Twitch, ces streamers qui s'adonnent à des multijoueurs les lundis soirs."

?>

    <div class="zoomCard">
        <div class="cardHeader">
            <div class="cardPseudo"><?php echo $nickname; ?></div>
            <div class="cardCategorieMain"><?php echo $mainCat; ?></div>
            <div class="cardCategorie2"></div>
            <div class="cardCategorie3"></div>
        </div>

        <img class="cardPhoto" src="picture/photos/photo-<?php echo $picture; ?>.jpg" alt="<?php echo $nickname; ?>" title="<?php echo $nickname; ?>">
        
        <div class="cardInfo">
            
            <div class="cardInfoRow">
                <div class="cardInfoCol colName">
                    <div class="cardInfoTitle">Nom civil</div>
                    <div class="cardInfoValue" id="valueCivil"><?php echo $name; ?></div>
                </div>

                <div class="cardInfoCol colAge">
                    <div class="cardInfoTitle">Âge</div>
                    <div class="cardInfoValue" id="valueAge"><?php echo ($age." ans"); ?><!-- Ici, script pour calculer l'âge à partir de la date de naissance --></div>
                </div>
            </div>

            <div class="cardInfoRow">
                <div class="cardInfoCol colCountry">
                    <div class="cardInfoTitle">Nationalité</div>
                    <div class="cardInfoValue countryFlag" id="valueFromCountry"><?php echo $country; ?></div>
                </div>

                <div class="cardInfoCol colLanguage">
                    <div class="cardInfoTitle">Langue de stream</div>
                    <div class="cardInfoValue countryFlag" id="valueLanguage"><?php echo $language; ?></div>
                </div>
            </div>

                <div class="cardInfoRow cardInfoUrl">
                    <div class="cardUrl cardYoutube" id="cardYoutube"></div>
                    <div class="cardUrl cardTwitch" id="cardTwitch"></div>
                    <div class="cardUrl cardKick" id="cardKick"></div>

                    <div class="cardUrl cardX" id="cardX"></div>
                    <div class="cardUrl cardInstagram" id="cardInstagram"></div>
                    <div class="cardUrl cardTiktok" id="cardTiktok"></div>
                    <div class="cardUrl cardSnapchat" id="cardSnapchat"></div>
                </div>
            
        

        <div class="cardSlotContainer">
            <div class="cardSlot" id="cardSlotLatest">
                    <div class="slotTitle">ACTIVITÉ RÉCENTE</div>

                    <div class="slotContent">
                        <iframe width="168" height="95" src="https://www.youtube.com/embed/lML_TC8ejZk?si=oa_LaDMqIcUWWi45" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        <iframe width="168" height="95" src="https://www.youtube.com/embed/leylJLmc6ms?si=KR00qo_i1p4sN9nb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
            </div>

            <div class="cardSlot cardFact" id="cardFact1">
                <div class="cardBulletInfo"></div>

                <div class="slotContent">
                    <?php echo $factOne; ?>
                </div>
            </div>

            <div class="cardSlot cardFact" id="cardFact1">
                <div class="cardBulletInfo"></div>

                <div class="slotContent">
                    <?php echo $factTwo; ?>
                </div>
            </div>

            <div class="cardSlot cardFact" id="cardFact1">
                <div class="cardBulletInfo"></div>

                <div class="slotContent">
                    <?php echo $factThree; ?>
                </div>
            </div>

        </div>
    </div>
