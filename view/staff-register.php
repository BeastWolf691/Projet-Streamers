<?php
include 'header.php';

// Initialisation de la variable d'erreurs
$errors = array();

if (!empty($_POST)) {
    // Récupération et sanitisation des données du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $lastName = htmlspecialchars(trim($_POST['lastName']));
    $nickname = htmlspecialchars(trim($_POST['nickname']));
    $password = htmlspecialchars(trim($_POST['password']));
    $mail = htmlspecialchars(trim($_POST['mail']));
    $picture = $_FILES['picture']; // Récupération du fichier

    // Validation des données du formulaire
    if (empty($name)) {
        $errors['name'] = "Le prénom est requis.";
    }

    if (empty($lastName)) {
        $errors['lastName'] = "Le nom de famille est requis.";
    }

    if (empty($nickname)) {
        $errors['nickname'] = "Le pseudo est requis.";
    }

    if (empty($password)) {
        $errors['password'] = "Le mot de passe est requis.";
    }

    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = "Le mail est requis et doit être valide.";
    }

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
    }

    if (empty($errors)) {
        // Requête préparée pour éviter les injections SQL
        $sql = "SELECT mail FROM admin WHERE mail=:mail";
        $pdoStatement = $pdo->prepare($sql);

        if ($pdoStatement) {
            $pdoStatement->execute(['mail' => $mail]);
            $result = $pdoStatement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $errors['mail'] = "Cette adresse email est déjà utilisée.";
            } else {
                // Enregistrer l'image
                $targetDirectory = "picture/staff/";
                $targetFile = $targetDirectory . basename($picture['name']);
                
                if (move_uploaded_file($picture['tmp_name'], $targetFile)) {
                    // Hachage du mot de passe
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    // Insertion dans la base de données
                    $insertSql = "INSERT INTO admin (name, lastName, nickname, password, mail, picture) VALUES (:name, :lastName, :nickname, :password, :mail, :picture)";
                    $insertStatement = $pdo->prepare($insertSql);
                    $insertStatement->execute([
                        'name' => $name,
                        'lastName' => $lastName,
                        'nickname' => $nickname,
                        'password' => $hashedPassword,
                        'mail' => $mail,
                        'picture' => $picture['name'] // Stocke le nom du fichier
                    ]);

                    echo "<div class=\"alert alert-success\" role=\"alert\">Inscription réussie</div>";
                    header('Location: index.php');
                    exit();
                } else {
                    $errors['picture'] = "Erreur lors du téléchargement de l'image.";
                }
            }
        } else {
            $errors['database'] = "Erreur de connexion à la base de données.";
        }
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
    <form method="post" action="" enctype="multipart/form-data">
        <label for="name">Prénom :</label><br>
        <input type="text" id="name" name="name" required placeholder="prénom" value="<?php echo htmlspecialchars($name ?? '', ENT_QUOTES); ?>"><br>

        <label for="lastName">Nom de famille :</label><br>
        <input type="text" id="lastName" name="lastName" required placeholder="nom de famille" value="<?php echo htmlspecialchars($lastName ?? '', ENT_QUOTES); ?>"><br>

        <label for="nickname">Pseudo :</label><br>
        <input type="text" id="nickname" name="nickname" required placeholder="Pseudo" value="<?php echo htmlspecialchars($nickname ?? '', ENT_QUOTES); ?>"><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required placeholder="Mot de passe"><br>

        <label for="mail">Email :</label><br>
        <input type="email" id="mail" name="mail" required placeholder="mail" value="<?php echo htmlspecialchars($mail ?? '', ENT_QUOTES); ?>"><br>

        <label for="picture">Photo :</label><br>
        <input type="file" id="picture" name="picture" required placeholder="photo"><br>

        <input type="submit" value="Soumettre"><br>
    </form>
</div>

<?php
include 'footer.php';
?>
