<?php

// Initialisation des variables d'erreurs et de saisie
$errors = [];
$nickname = $mainCat = $secondCat = $thematic = $name = $language = $pYoutube = $pTwitch = $pKick = $pTwitter = $pInstagram = $pTiktok = $factOne = $factTwo = $factThree = $birthday = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et sanitisation des données du formulaire
    $nickname = htmlspecialchars(trim($_POST['nickname']));
    $mainCat = htmlspecialchars(trim($_POST['mainCat']));
    $secondCat = !empty($_POST['secondCat']) ? htmlspecialchars(trim($_POST['secondCat'])) : "";
    $thematic = htmlspecialchars(trim($_POST['thematic']));
    $picture = !empty($_FILES['picture']) ? $_FILES['picture'] : ""; // Récupération du fichier
    $name = htmlspecialchars(trim($_POST['name']));
    $language = htmlspecialchars(trim($_POST['language']));
    $pYoutube = !empty($_POST['pYoutube']) ? htmlspecialchars(trim($_POST['pYoutube'])) : "";
    $pTwitch = !empty($_POST['pTwitch']) ? htmlspecialchars(trim($_POST['pTwitch'])) : "";
    $pKick = !empty($_POST['pKick']) ? htmlspecialchars(trim($_POST['pKick'])) : "";
    $pTwitter = !empty($_POST['pTwitter']) ? htmlspecialchars(trim($_POST['pTwitter'])) : "";
    $pInstagram = !empty($_POST['pInstagram']) ? htmlspecialchars(trim($_POST['pInstagram'])) : "";
    $pTiktok = !empty($_POST['pTiktok']) ? htmlspecialchars(trim($_POST['pTiktok'])) : "";
    $factOne = !empty($_POST['factOne']) ? htmlspecialchars(trim($_POST['factOne'])) : "";
    $factTwo = !empty($_POST['factTwo']) ? htmlspecialchars(trim($_POST['factTwo'])) : "";
    $factThree = !empty($_POST['factThree']) ? htmlspecialchars(trim($_POST['factThree'])) : "";
    $birthdate = htmlspecialchars(trim($_POST['birthdate']));

    // Validation des champs
    if (empty($nickname)) {
        $errors['nickname'] = "Le pseudo est requis.";
    }
    if (empty($mainCat)) {
        $errors['mainCat'] = "La catégorie principale est requise.";
    }
    if (empty($thematic)) {
        $errors['thematic'] = "le thème est requis.";
    }

    if (!empty($picture['name'])) {
        if (empty($picture['name'])) {
            $errors['picture'] = "La photo est requise.";
        } else {
            // Vérification du type et de la taille du fichier
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($picture['type'], $allowedTypes)) {
                $errors['picture'] = "Le fichier doit être une image (JPEG, PNG, GIF).";
            }

            if ($picture['size'] > 2000000) { // Limite de 2 Mo
                $errors['picture'] = "La taille de l'image ne doit pas dépasser 2 Mo.";
            }
            // Si aucun problème, on peut déplacer le fichier
            if (empty($errors['picture'])) {
                $uploadDir = '../picture/photos/';
                $extension = pathinfo($picture['name'], PATHINFO_EXTENSION); //extension du fichier
                $fileName = 'photo-' . htmlspecialchars(trim($nickname)) . '-' . $extension;
                //le fichier sera renommé avec le pseudo
                $uploadFile = $uploadDir . $fileName;

                // Déplacement du fichier vers le répertoire final
                if (!move_uploaded_file($picture['tmp_name'], $uploadFile)) {
                    $errors['picture'] = "Erreur lors de l'upload de l'image.";
                }
            }
        }
    } else {
        $uploadFile = '../picture/photos/photo-_default_.jpg';
    }
    if (empty($name)) {
        $errors['name'] = "Le prénom est requis.";
    }
    if (empty($language)) {
        $errors['language'] = "La langue est requise.";
    }

    //vérifie la validité des pseudo
    if (!empty($pYoutube) && !preg_match('/^[a-zA-Z0-9_]{3,25}$/', $pYoutube)) {
        $errors['pYoutube'] = "Le pseudo Youtube doit contenir entre 3 et 25 caractères.";
    }
    if (!empty($pTwitch) && !preg_match('/^[a-zA-Z0-9_]{3,25}$/', $pTwitch)) {
        $errors['pTwitch'] = "Le pseudo Twitch doit contenir entre 3 et 25 caractères.";
    }
    if (!empty($pKick) && !preg_match('/^[a-zA-Z0-9_]{3,25}$/', $pKick)) {
        $errors['pKick'] = "Le pseudo Kick doit contenir entre 3 et 25 caractères.";
    }
    if (!empty($pTwitter) && !preg_match('/^[a-zA-Z0-9_]{3,25}$/', $pTwitter)) {
        $errors['pTwitter'] = "Le pseudo Twitter doit contenir entre 3 et 25 caractères.";
    }
    if (!empty($pInstagram) && !preg_match('/^[a-zA-Z0-9_]{3,25}$/', $pInstagram)) {
        $errors['pInstagram'] = "Le pseudo Instagram doit contenir entre 3 et 25 caractères.";
    }
    if (!empty($pTiktok) && !preg_match('/^[a-zA-Z0-9_]{3,25}$/', $pTiktok)) {
        $errors['pTiktok'] = "Le pseudo Tiktok doit contenir entre 3 et 25 caractères.";
    }
    if (!empty($birthdate)) {
        // Vérification du format général (YYYY-MM-DD)
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthdate)) {
            $errors['birthdate'] = "Le format de la date doit être YYYY-MM-DD.";
        } else {
            // Découpe de la date et vérification de la validité réelle de la date ex : pas de 30 février
            $dateParts = explode('-', $birthdate);
            if (count($dateParts) === 3 && !checkdate((int)$dateParts[1], (int)$dateParts[2], (int)$dateParts[0])) {
                $errors['birthdate'] = "La date de naissance est invalide.";
            }
        }
    }

    if (empty($errors)) {
        $req = $pdo->prepare("INSERT INTO cards (nickname, mainCat, secondCat, thematic, picture, name, language, pYoutube, pTwitch, pKick, pTwitter, pInstagram, pTiktok, factOne, factTwo, factThree, birthdate) VALUES (:nickname, :mainCat, :secondCat, :thematic, :picture, :name, :language, :pYoutube, :pTwitch, :pKick, :pTwitter, :pInstagram, :pTiktok, :factOne, :factTwo, :factThree, :birthdate)");
        $req->execute([
            'nickname' => $nickname,
            'mainCat' => $mainCat,
            'secondCat' => $secondCat,
            'thematic' => $thematic,
            'picture' => $uploadFile,
            'name' => $name,
            'language' => $language,
            'pYoutube' => $pYoutube,
            'pTwitch' => $pTwitch,
            'pKick' => $pKick,
            'pTwitter' => $pTwitter,
            'pInstagram' => $pInstagram,
            'pTiktok' => $pTiktok,
            'factOne' => $factOne,
            'factTwo' => $factTwo,
            'factThree' => $factThree,
            'birthdate' => $birthdate
        ]);

        //Retour a la page d'accueil
        header('Location: index.php');
        exit();
    }
}
?>

<div class="form-container">
    <?php if (!empty($errors)) : ?>
        <div class="erreur">
            <div class="alert alert-secondary" role="alert">
                Vous n'avez pas rempli le formulaire correctement
            </div>

            <?php foreach ($errors as $error) : ?>
                <div><?php echo "<div class=\"alert alert-danger\" role=\"alert\">$error</div>"; ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form action="" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
        <h1 style="text-align: center"> - Ajout d'une Carte - </h1>

        <label for="nickname">Pseudo</label>
        <input type="text" name="nickname" id="nickname">

        <label for="mainCat">Catégorie principale</label>
        <input type="text" name="mainCat" id="mainCat">

        <label for="secondCat">Catégorie secondaire</label>
        <input type="text" name="secondCat" id="secondCat">

        <label for="thematic">thème</label><br>
        <input type="text" name="thematic" id="thematic"><br>

        <label for="picture">Photo</label><br>
        <input type="file" name="picture" id="picture"><br>

        <label for="name">Prénom</label>
        <input type="text" name="name" id="name">

        <label for="language">Langue </label>
        <input type="text" name="language" id="language">

        <label for="pYoutube">Pseudo YouTube</label>
        <input type="text" name="pYoutube" id="pYoutube">

        <label for="pTwitch">Pseudo Twitch</label>
        <input type="text" name="pTwitch" id="pTwitch">

        <label for="pKick">Pseudo Kick</label>
        <input type="text" name="pKick" id="pKick">

        <label for="pTwitter">Pseudo Twitter</label>
        <input type="text" name="pTwitter" id="pTwitter">

        <label for="pInstagram">Pseudo Instagram</label>
        <input type="text" name="pInstagram" id="pInstagram">

        <label for="pTiktok">Pseudo Tiktok</label>
        <input type="text" name="pTiktok" id="pTiktok">

        <label for="factOne">Fait 1</label>
        <input type="text" name="factOne" id="factOne">

        <label for="factTwo">Fait 2</label>
        <input type="text" name="factTwo" id="factTwo">

        <label for="factThree">Fait 3</label>
        <input type="text" name="factThree" id="factThree">

        <label for="birthdate">Anniversaire</label>
        <input type="date" name="birthdate" id="birthdate">

        <input type="submit" value="Ajouter">

    </form>
</div>