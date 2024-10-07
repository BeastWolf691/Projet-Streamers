<?php
include 'header.php';

// Initialisation de la variable d'erreurs
$errors = array();

if (!empty($_POST)) {
    // Récupération et sanitisation des données du formulaire
    $mail = htmlspecialchars(trim($_POST['mail']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validation des données du formulaire
    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = "Le mail est requis et doit être valide.";
    }

    if (empty($password)) {
        $errors['password'] = "Le mot de passe est requis.";
    }

    if (empty($errors)) {
        // Requête préparée pour éviter les injections SQL
        $sql = "SELECT name, password, mail FROM admin WHERE mail=:mail";
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

                    // Connexion réussie
                    $_SESSION['compte'] = $_POST['mail']; // Stocker l'email dans la session 'compte'
                    $_SESSION['name'] = $result['name'];  // Stocker le nom dans la session 'name'

                    exit();
                } else {
                    $errors['password'] = "Email ou mot de passe incorrect.";
                }
            } else {
                $errors['mail'] = "Email ou mot de passe incorrect.";
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
        <h1>- Accès Admin -</h1>
        <label for="mail">Email :</label><br>
        <input type="email" id="mail" name="mail" required placeholder="mail" value="<?php echo htmlspecialchars($mail ?? '', ENT_QUOTES); ?>"><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required placeholder="Mot de passe"><br>

        <input type="submit" value="Se connecter"><br>
    </form>
</div>

<?php
include 'footer.php';
?>