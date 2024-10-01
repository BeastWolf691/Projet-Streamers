<?php

?>

<div class="test"></div>
<form id="filterForm">
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

            $sqlCatSecondary = "SELECT DISTINCT secondCat FROM cards WHERE secondCat IS NOT NULL AND secondCat != '' ORDER BY secondCat ASC";
            $reqCatSecondary = $pdo->query($sqlCatSecondary);

            while ($d = ($reqCatSecondary->fetch(PDO::FETCH_OBJ))) {
                echo '<option value="' . $d->secondCat . '">' . $d->secondCat . '</option>';
            }
            ?>

        </select>
    </div>
<!-- ----------------------- -->

<div class="filter-item">
        <label id="thematics" for="thematic">Thèmes</label>
        <select id="thematic" name="thematic">
            <option value=""></option>
            <?php
            // Nouvelle requête pour récupérer les catégories principales, secondaires et les thèmes
            $sqlThem = "SELECT DISTINCT mainCat, secondCat, thematic 
                        FROM cards 
                        WHERE thematic IS NOT NULL AND thematic != '' 
                        ORDER BY mainCat ASC, secondCat ASC, thematic ASC";
            $reqThem = $pdo->query($sqlThem);

            $currentMainCat = null;
            $currentSecondCat = null;

            while ($d = ($reqThem->fetch(PDO::FETCH_OBJ))) {
                // Vérifie si la catégorie principale a changé pour commencer un nouvel optgroup
                if ($currentMainCat !== $d->mainCat) {
                    // Fermer l'optgroup précédent s'il y en a un
                    if ($currentMainCat !== null) {
                        echo '</optgroup>';
                    }
                    // Commencer un nouvel optgroup pour la nouvelle catégorie principale
                    echo '<optgroup label="MainCat: ' . htmlspecialchars($d->mainCat) . '">';
                    $currentMainCat = $d->mainCat;
                }

                // Ajouter le thème dans l'optgroup de la catégorie principale
                echo '<option value="' . htmlspecialchars($d->thematic) . '">' . htmlspecialchars($d->thematic) . '</option>';
            }

            // Fermer le dernier optgroup pour mainCat
            if ($currentMainCat !== null) {
                echo '</optgroup>';
            }

            // Maintenant, on fait la même chose pour secondCat
            $sqlThemSecondary = "SELECT DISTINCT secondCat, thematic 
                                 FROM cards 
                                 WHERE thematic IS NOT NULL AND thematic != '' 
                                 AND secondCat IS NOT NULL AND secondCat != ''
                                 ORDER BY secondCat ASC, thematic ASC";
            $reqThemSecondary = $pdo->query($sqlThemSecondary);

            $currentSecondCat = null;

            while ($d = ($reqThemSecondary->fetch(PDO::FETCH_OBJ))) {
                // Vérifie si la catégorie secondaire a changé pour commencer un nouvel optgroup
                if ($currentSecondCat !== $d->secondCat) {
                    // Fermer l'optgroup précédent s'il y en a un
                    if ($currentSecondCat !== null) {
                        echo '</optgroup>';
                    }
                    // Commencer un nouvel optgroup pour la nouvelle catégorie secondaire
                    echo '<optgroup label="SecondCat: ' . htmlspecialchars($d->secondCat) . '">';
                    $currentSecondCat = $d->secondCat;
                }

                // Ajouter le thème dans l'optgroup de la catégorie secondaire
                echo '<option value="' . htmlspecialchars($d->thematic) . '">' . htmlspecialchars($d->thematic) . '</option>';
            }

            // Fermer le dernier optgroup pour secondCat
            if ($currentSecondCat !== null) {
                echo '</optgroup>';
            }
            ?>
        </select>
    </div>

<!-- ------------------------------------ -->
    <div class="filter-item">
        <label id="age" for="ages">Tranche d'âge</label>
        <select id="ages" name="age">
            <option value=""></option>
            <option value="under18"> Moins de 18 ans</option>
            <option value="18-35">De 18 à 35 ans</option>
            <option value="over35"> Plus de 35 ans</option>
        </select>
    </div>

    <div class="filter-item">
        <label for="names">Streamers/euses&nbsp;</label>
        <select id="names" name="names">
            <option value=""></option>
            <?php

            $sqlNick = 'SELECT DISTINCT nickname FROM cards ORDER BY nickname ASC';
            $reqNick = $pdo->query($sqlNick);

            while ($d = $reqNick->fetch(PDO::FETCH_OBJ)) {
                // Supprimer les caractères speciaux du nickname
                $nicknameCleaned = str_replace(['.', '/', '@', '#'], '', $d->nickname);

                echo '<option value="' . $nicknameCleaned . '">' . $nicknameCleaned . '</option>';
            }

            ?>

        </select>
    </div>

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

    <input type="reset" value="Réinitialiser les filtres" />

</form>