<?php
include 'header.php';

// Initialisation des variables d'erreurs et de saisie
$errors = [];
$name = $lastName = $password = $mail ='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et sanitisation des données du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $lastName = htmlspecialchars(trim($_POST['lastName']));
    $password = htmlspecialchars(trim($_POST['password']));
    $mail = htmlspecialchars(trim($_POST['mail']));

    // Validation des données du formulaire
    if (empty($name)) {
        $errors['name'] = "Le prénom est requis.";
    }

    if (empty($lastName)) {
        $errors['lastName'] = "Le nom de famille est requis.";
    }

    if (empty($password)) {
        $errors['password'] = "Le mot de passe est requis.";
    }

    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = "Le mail est requis et doit être valide.";
    }
    if (empty($errors)) {
        // Requête préparée pour éviter les injections SQL
        $sql = "SELECT mail FROM admin WHERE mail=:mail";
        $pdoStatement = $pdo->prepare($sql);

        if ($pdoStatement) {
            $pdoStatement->execute(['mail' => $mail]);
            $result = $pdoStatement->fetch(PDO::FETCH_ASSOC);
        }
        if ($result) {
            $errors['mail'] = "Cette adresse email est déjà utilisée.";
        } else {

            try {
                // Hachage du mot de passe
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                // Insertion dans la base de données
                $insertSql = "INSERT INTO admin (name, lastName, password, mail) VALUES (:name, :lastName, :password, :mail)";
                $insertStatement = $pdo->prepare($insertSql);
                $insertStatement->execute([
                    'name' => $name,
                    'lastName' => $lastName,
                    'password' => $hashedPassword,
                    'mail' => $mail
                ]);

                echo "<div class=\"alert alert-success\" role=\"alert\">Inscription réussie</div>";
                header('Location: staff-logIn.php');
                exit();
            } catch (PDOException $e) {
                $errors['database'] = "Erreur de connexion à la base de données : " . $e->getMessage();
            }
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
        <input type="text" id="name" name="name" required placeholder="prénom" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>"><br>

        <label for="lastName">Nom de famille :</label><br>
        <input type="text" id="lastName" name="lastName" required placeholder="nom de famille" value="<?php echo htmlspecialchars($lastName, ENT_QUOTES); ?>"><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required placeholder="Mot de passe"><br>

        <label for="mail">Email :</label><br>
        <input type="email" id="mail" name="mail" required placeholder="mail" value="<?php echo htmlspecialchars($mail, ENT_QUOTES); ?>"><br>

        <input type="submit" value="Soumettre"><br>
    </form>
</div>