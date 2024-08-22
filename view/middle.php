<div id="middle">
    <aside class="filter-bar">
        <?php include "filter.php";
        ?>

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
            <div class="card <?php echo $cssClass; ?>" data-id="<?php echo $d->id; ?>" data-second="<?php echo $d->secondCat; ?>" data-info="<?php echo $mainCat; ?>" data-thematic="<?php echo strtolower($d->thematic); ?>" data-age="<?php echo $age; ?>">

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
                <p>Âge : <?php echo $age; ?> ans</p>

            </div>
        <?php } ?>
    </div>
</div>