
<div id="middle">
    <aside class="filter-bar">
        <div class="test"></div>

        <div class="filter-item">
            <label id="category" for="type">Catégories</label>
            <select id="type" name="type">
                <option value=""></option>
                <option value="gaming">Gaming</option>
                <option value="divers">Divers</option>
                <option value="jeu-video">Jeu Vidéo</option>
                <option value="actualite-esport">Actualité Esport</option>
                <option value="fps">FPS</option>
                <option value="sport">Sport</option>
                <option value="cuisine">Cuisine</option>
                <option value="talk-show">Talk-show</option>
                <option value="rpg">RPG</option>
                <option value="formation">Formation</option>
                <option value="developpement-web-tutoriels">Développement Web Tutoriels</option>
                <option value="diversite">Diversité</option>
                <option value="actualites">Actualités</option>
                <option value="informations">Informations</option>
                <option value="societe">Société</option>
                <option value="vlog">Vlog</option>
                <option value="irl">IRL</option>
                <option value="vintage">Vintage</option>
                <option value="aventure">Aventure</option>
                <option value="politique">Politique</option>
                <option value="manga">Manga</option>
                <option value="lifestyle">LifeStyle</option>
                <option value="react">React</option>
                <option value="esport">Esport</option>
                <option value="humour">Humour</option>
                <option value="divertissement">Divertissement</option>
                <option value="varietes">Variétés</option>
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
        include 'bdd.php';
        $sql = 'SELECT id, nickname, mainCat, thematic, picture, name, language, pYoutube,
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
            <div class="card <?php echo $cssClass; ?>" data-id="<?php echo $d->id; ?>" data-info="<?php echo $mainCat; ?>">
                <p> <?php echo $d->nickname; ?></p>
                <img src="picture/photos/photo-<?php echo $d->picture; ?>.jpg" alt="<?php echo $nickname; ?>" title="<?php echo $nickname; ?>">
                <p> <?php echo $d->mainCat; ?></p>
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
