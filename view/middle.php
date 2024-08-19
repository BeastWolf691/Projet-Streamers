<div id="middle">
    <aside class="filter-bar">
        <div class="test"></div>

        <div class="filter-item">
            <label id="category" for="type">Catégorie</label>
            <select id="type" name="type">
                <option value=""></option>
                <?php

                $sqlCat = 'SELECT DISTINCT mainCat FROM cards ORDER BY mainCat ASC';
                $reqCat = $pdo->query($sqlCat);

                while ($d = ($reqCat->fetch(PDO::FETCH_OBJ))) {
                    echo '<option value="' . $d->mainCat . '">' . $d->mainCat . '</option>';
                }
                ?>

            </select>
        </div>

        <div class="filter-item">
            <label id="category" for="categoryS">Categorie 2</label>
            <select id="categoryS" name="categoryS">
                <option value=""></option>
                <?php

                $sqlCatSecondary = "SELECT DISTINCT secondCat FROM cards WHERE secondCat IS NOT NULL AND secondCat != ''ORDER BY thematic ASC";
                $reqCatSecondary = $pdo->query($sqlCatSecondary);

                while ($d = ($reqCatSecondary->fetch(PDO::FETCH_OBJ))) {
                    echo '<option value="' . htmlspecialchars($d->secondCat) . '">' . htmlspecialchars($d->secondCat) . '</option>';
                }
                ?>

            </select>
        </div>

        <div class="filter-item">
            <label id="thematic" for="thematic">Thèmes</label>
            <select id="thematic" name="thematic">
                <option value=""></option>
                <?php
                // Requête SQL modifiée pour exclure les valeurs nulles ou vides
                $sqlThem = "SELECT DISTINCT thematic FROM cards WHERE thematic IS NOT NULL AND thematic != '' ORDER BY thematic ASC";
                $reqThem = $pdo->query($sqlThem);

                while ($d = ($reqThem->fetch(PDO::FETCH_OBJ))) {
                    echo '<option value="' . htmlspecialchars($d->thematic) . '">' . htmlspecialchars($d->thematic) . '</option>';
                }
                ?>
            </select>

            <div class="filter-item">
                <label id="age" for="age">Tranche d'âge</label>
                <select id="age" name="age">
                    <option value=""></option>
                    <option value="young">Moins de 18 ans</option>
                    <option value="normal">De 18 à 35 ans</option>
                    <option value="old">Plus de 35 ans</option>
                </select>
            </div>
        </div>



        <!-- <div class="filter-item">
            <label for="alphabet">Tranche alphabet</label>
            <select id="alphabet" name="alphabet">
                <option></option>
                <option>A - E</option>
                <option>F - J</option>
                <option>K - O</option>
                <option>P - T</option>
                <option>U - Z</option>
            </select>
        </div> -->



        <div class="filter-item">
            <label for="names">Streamers/euses&nbsp;</label>
            <select id="names" name="names">
                <option value=""></option>
                <?php

                $sqlNick = 'SELECT DISTINCT nickname FROM cards ORDER BY nickname ASC';
                $reqNick = $pdo->query($sqlNick);

                while ($d = $reqNick->fetch(PDO::FETCH_OBJ)) {
                    // Supprimer les caractères speciaux du nickname
                    $nicknameCleaned = str_replace(['_', '.', '/', '@', '#'], '', $d->nickname);

                    echo '<option value="' . $nicknameCleaned . '">' . $nicknameCleaned . '</option>';
                }
                ?>

            </select>
        </div>
        <!-- 
        <div class="filter-item">
            <label for="date">Date de création&nbsp;</label>
            <select id="date" name="date">
                <option></option>
                <option>depuis 2005</option>
                <option>depuis 2010</option>
                <option>depuis 2015</option>
                <option>depuis 2020</option>
            </select>
        </div> -->

        <div class="filter-item">
            <label id="speak" for="languages">Langues</label>
            <select id="languages" name="languages">
                <option></option>
                <?php

                $sqlLang = 'SELECT DISTINCT language FROM cards ORDER BY language ASC';
                $reqLang = $pdo->query($sqlLang);

                while ($d = $reqLang->fetch(PDO::FETCH_OBJ)) {
                    echo '<option value="' . $d->language . '">' . $d->language . '</option>';
                }
                ?>
            </select>
        </div>

        <!--   <div class="filter-item">
            <button type="button" class="btn btn-primary">Rechercher</button>
        </div> -->
    </aside>

    <aside class="result">
        <?php require_once "zoomCard.php"; ?>
    </aside>

    <div class="content">
        <!-- récupération -->
        <?php

        $sql = 'SELECT id, nickname, mainCat, secondCat,thematic, picture, name, language, pYoutube,
      ptwitch, pKick, pTwitter, pInstagram, pTiktok, videoOne, videoTwo, factOne, factTwo, factThree, birthdate FROM cards ORDER BY nickname ASC';
        $req = $pdo->query($sql);

        while ($d = $req->fetch(PDO::FETCH_OBJ)) { // pour chaque ligne dans la BDD, on crée une carte

            // Pour chaque valeur de mainCat et de thematic, j'applique un css différent
            $mainCat = $d->mainCat;

            // Remplacement des espaces et caractères spéciaux pour créer une classe CSS valide
            $cssClass = 'cat_' . strtolower(str_replace([' ', '-', ','], '_', $mainCat));
            $mainCat = strtolower($d->nickname . ' ' . $d->mainCat . ' ' . $d->thematic . ' ' . $d->language);

            // Calcul de l'âge à partir de la date de naissance
            $birthdate = new DateTime($d->birthdate);
            $now = new DateTime();
            $age = $now->diff($birthdate)->y;
        ?>
            <div class="card <?php echo $cssClass; ?>" data-id="<?php echo $d->id; ?>" data-info="<?php echo $mainCat; ?>" data-age="<?php echo $age; ?>">
                <p> <?php echo $d->nickname; ?></p>
                <img src="picture/photos/photo-<?php echo $d->picture; ?>.jpg" alt="<?php echo $nickname; ?>" title="<?php echo $nickname; ?>">
                <p> <?php echo $d->mainCat; ?></p>
                <p> <?php echo $d->secondCat; ?></p>
                <p> <?php echo $d->thematic; ?></p>
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
                <p>Âge : <?php echo $age; ?> ans</p>

            </div>
        <?php } ?>
    </div>
</div>