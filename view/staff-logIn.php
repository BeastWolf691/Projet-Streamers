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
    $picture = htmlspecialchars(trim($_POST['picture']));

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

    if (empty($mail)) {
        $errors['mail'] = "Le mail est requis.";
    }

    if (empty($picture)) {
        $errors['picture'] = "La photo est requise.";
    }

    if (empty($errors)) {
        // Requête préparée pour éviter les injections SQL
        $sql = "SELECT mail, mail FROM admin WHERE mail=:mail";
        $pdoStatement = $pdo->prepare($sql);

        if ($pdoStatement) {
            $pdoStatement->execute(['mail' => $mail]);
            $result = $pdoStatement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Vérification du mot de passe
                if (password_verify($password, $result['password'])) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">Connexion réussie</div>";
                    sleep(1);
                    header('Location: index.php');
                    if (!isset($_SESSION['compte'])) $_SESSION['compte'] = "";
                    $_SESSION['compte'] = $_POST['mail'];
                    $_SESSION['compte'] = $nickname; // récupère le psuedo et le met dans session compte
                    exit();
                } else {
                    $errors['password'] = "Mot de passe invalide.";
                }
            } else {
                $errors['nickname'] = "Pseudo ou mot de passe invalide.";
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
    <form method="post" action="">
        <label for="name">Prénom :</label><br>
        <input type="text" id="name" name="name" required placeholder="prénom" value="<?php echo htmlspecialchars($name ?? '', ENT_QUOTES); ?>"><br>

        <label for="lastName">Nom de famille :</label><br>
        <input type="text" id="lastName" name="lastName" required placeholder="nom de famille" value="<?php echo htmlspecialchars($lastName ?? '', ENT_QUOTES); ?>"><br>

        <label for="nickname">Pseudo :</label><br>
        <input type="text" id="nickname" name="nickname" required placeholder="Pseudo" value="<?php echo htmlspecialchars($nickname ?? '', ENT_QUOTES); ?>"><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required placeholder="Mot de passe"><br>

        <label for="mail">Email :</label><br>
        <input type="mail" id="mail" name="mail" required placeholder="mail" value="<?php echo htmlspecialchars($mail ?? '', ENT_QUOTES); ?>"><br>

        <label for="picture">Pseudo :</label><br>
        <input type="text" id="picture" name="picture" required placeholder="photo" value="<?php echo htmlspecialchars($picture ?? '', ENT_QUOTES); ?>"><br>

        <input type="submit" value="Soumettre"><br>
    </form>
</div>

<?php
include 'footer.php';
?>