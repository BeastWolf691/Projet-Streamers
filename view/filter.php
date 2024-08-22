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

    <div class="filter-item">
        <label id="thematics" for="thematic">Thèmes</label>
        <select id="thematic" name="thematic">
            <option value=""></option>
            <?php

            $sqlThem = "SELECT DISTINCT thematic FROM cards WHERE thematic IS NOT NULL AND thematic != '' ORDER BY thematic ASC";
            $reqThem = $pdo->query($sqlThem);

            while ($d = ($reqThem->fetch(PDO::FETCH_OBJ))) {
                echo '<option value="' . htmlspecialchars($d->thematic) . '">' . htmlspecialchars($d->thematic) . '</option>';
            }
            ?>
        </select>
    </div>


    <div class="filter-item">
        <label id="age" for="age">Tranche d'âge</label>
        <select id="age" name="age">
            <option value=""></option>
            <optgroup label="Moins de 18 ans">
                <?php
                $sqlBirth = 'SELECT birthdate FROM cards';
                $reqBirth = $pdo->query($sqlBirth);

                while ($d = $reqBirth->fetch(PDO::FETCH_OBJ)) {
                    $birthdate = new DateTime($d->birthdate);
                    $now = new DateTime();
                    $age = $now->diff($birthdate)->y;

                    if ($age < 18) {
                        echo '<option value="' . $age . '">' . $age . ' ans</option>';
                    }
                }
                ?>
            </optgroup>

            <optgroup label="De 18 à 35 ans">
                <?php
                $reqBirth->execute();

                while ($d = $reqBirth->fetch(PDO::FETCH_OBJ)) {
                    $birthdate = new DateTime($d->birthdate);
                    $now = new DateTime();
                    $age = $now->diff($birthdate)->y;

                    if ($age >= 18 && $age <= 35) {
                        echo '<option value="' . $age . '">' . $age . ' ans</option>';
                    }
                }
                ?>
            </optgroup>

            <optgroup label="Plus de 35 ans">
                <?php
                $reqBirth->execute();

                while ($d = $reqBirth->fetch(PDO::FETCH_OBJ)) {
                    $birthdate = new DateTime($d->birthdate);
                    $now = new DateTime();
                    $age = $now->diff($birthdate)->y;

                    if ($age > 35) {
                        echo '<option value="' . $age . '">' . $age . ' ans</option>';
                    }
                }
                ?>
            </optgroup>
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