
<link rel="stylesheet" media="screen and (min-width: 981px)" href="../css/desk/index.css" />

<div id="middle">
    <aside class="filter-bar">
        <div class="test"></div>

        <div class="filter-item">
            <label id="category" for="type">Catégories</label>
            <select id="type" name="type">
                <option value=""></option>
                <option value="sport">sport</option>
                <option value="food">cuisine</option>
                <option value="gaming">gaming</option>
                <option value="urbex">urbex</option>
                <option value="musique">musique</option>
                <option value="art">art</option>
                <option value="fitness">fitness</option>
                <option value="tourisme">tourisme</option>
                <option value="beauté">beauté</option>
                <option value="mode">mode</option>
            </select>
        </div>

        <div class="filter-item">
            <label for="alphabet">Tranche alphabet</label>
            <select id="alphabet" name="alphabet">
                <option></option>
                <option>A - E</option>
                <option>F - J</option>
                <option>K - O</option>
                <option>P - T</option>
                <option>U - Z</option>
            </select>
        </div>



        <div class="filter-item">
            <label for="names">Streamers/euses&nbsp;</label>
            <select id="names" name="names">
                <option></option>
            </select>
        </div>

        <div class="filter-item">
            <label for="date">Date de création&nbsp;</label>
            <select id="date" name="date">
                <option></option>
                <option>depuis 2005</option>
                <option>depuis 2010</option>
                <option>depuis 2015</option>
                <option>depuis 2020</option>
            </select>
        </div>

        <div class="filter-item">
            <label id="speak" for="languages">Langues</label>
            <select id="languages" name="languages">
                <option></option>
                <option>français</option>
                <option>anglais</option>
                <option>espagnol</option>
                <option>italien</option>
            </select>
        </div>

        <div class="filter-item">
            <button type="button" class="btn btn-primary">Appliquer</button>
        </div>
    </aside>
    
    <aside class="result">
        Résultat + infos
    </aside>

    <div class="content">
<!-- récupération -->
<?php
        $sql =  'SELECT nickname, mainCat, thematic, picture, name, language, pYoutube,
            ptwitch, pKick, pTwitter, pInstagram, pTiktok, videoOne, videoTwo, factOne, factTwo, factThree FROM cards ';
        $req = $pdo->query($sql);


        while ($d = $req->fetch(PDO::FETCH_OBJ)) { // pour chaque ligne dans la BDD, on crée une carte

            $mainCat = $d->mainCat;
            switch ($mainCat) {
                case 'Gaming':
                    $cssClass = 'cat_video';
                    break;
                case 'IRL':
                    $cssClass = 'cat_real';
                    break;
                case 'Cooking':
                    $cssClass = 'cat_cook';
                    break;
                default:
                    $cssClass = '';
                    break;
            }
            $mainCat = strtolower($d->nickname . ' ' . $d->mainCat . ' ' . $d->thematic . ' ' . $d->language);

        ?>
            <div class="card <?php echo $cssClass; ?>" data-info="<?php echo $mainCat; ?>">
                <p> <?php echo $d->nickname; ?></p>
                <p> <?php echo $d->mainCat; ?></p>
                <p> <?php echo $d->thematic; ?></p>
                <p> <?php echo $d->picture; ?> </p>
                <p> <?php // echo $d->name; 
                    ?> </p>
                <p> <?php echo $d->language; ?> </p>
                <p> <?php echo $d->pYoutube; ?> </p>
                <p> <?php echo $d->ptwitch; ?> </p>
                <p> <?php //echo $d->pKick; 
                    ?> </p>
                <p> <?php //echo $d->pTwitter; 
                    ?> </p>
                <p> <?php //echo $d->pInstagram; 
                    ?> </p>
                <p> <?php //echo $d->pTiktok; 
                    ?> </p>
                <p> <?php //echo $d->videoOne; 
                    ?> </p>
                <p> <?php //echo $d->videoTwo; 
                    ?> </p>
                <p> <?php //echo $d->factOne; 
                    ?> </p>
                <p> <?php //echo $d->factTwo; 
                    ?> </p>
                <p> <?php //echo $d->factThree; 
                    ?> </p>

            </div>
        <?php } ?>

        <!--  ici se trouvera le contenu tableau des influenceurs
            avec les informations liées (profil, photo, date de naissance ?, récap du contenu qu'il fait,
            depuis quand il a commencé, liens + icones des différents réseaux qu'il a, et récap de son profil
            (background du perso))
            Nom Followers Instagram
            Nicocapone 8,7M<br>
            SqueeZie 7,8 M<br>
            Norman Thavaud 6 M<br>
            Cyprien 6 M<br>
            Enjoy Phoenix 5,6 M<br>
            Seanfreestyle 5,5 M<br>
            Tibo InShape 4,8 M<br>
            Caroline Receveur 4,8 M<br>
            Mister V 4,5 M<br>
            Michou 4,1 M<br>
    Natoo 3,9 M<br>
            Mcfly 3,7 M<br>
            Lena situations 3,7 M<br>
            Inoxtag 3,6 M<br>
            Carlito 3,3 M<br>
            Stephdurant 3,2 M<br>
            Jujufitcats 3,1 M<br>
            Seb la Frite 3 M<br>
            Amixem 2,8 M<br>
            Joyca 2,8 M<br>
            The doll beauty 2,9 M<br>
            Sananas 2,6 M<br>
            Le Vrai Bouseuh 2,3 M<br>
            Le Rire Jaune 2,2 M<br>
            L’atelier de Roxane 2,1 M<br>
            Mastuu 2,1 M<br>
            Hugo Decrypte 2 M<br>
            Sonia Tlev 1,9 M<br>
            FastGoodCuisine 1,9 M<br>
            Paolalct 1,8 M<br>
            Emma CakeCup 1,7 M<br>
            GaelleGD 1,6 M<br>
            IbraTV 1,6 M<br>
            Romy 1,6 M<br>
            Andy Rowski 1,5 M<br>
            Sissy MUA 1,5 M<br>
            Valouzz 1,5 M<br>
            Cyril MP4 1,5 M<br>
            Juste Zoé 1,4 M<br>
            Henri Tran 1,4 M<br>
            Horia 1,4 M<br>
            Shera Kerienski 1,4 M<br>
            LufyMakesYouUp 1,3 M<br>
            Elsa Bois 1,3 M<br>
            Maxenss 1,3 M<br> 
            Gotaga 1,3 M<br>
            VodK 1,2 M<br>
            Hugo tout seul 1,2 M<br>
            Sulivan Gwed 1,2 M<br>
            WassFreestyle 1,1 M<br>
            Emy LTR 1,1 M<br>
            Sundy Jules 1,1 M<br>
            Sandrea26 1,1 M<br>
            Doigby 1,1 M<br>
            Pierre Croce 1,1 M<br>
            Clara Marz 1,1 M<br> -->
    </div>
</div>