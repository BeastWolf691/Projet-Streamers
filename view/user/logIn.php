<?php

include 'header.php';

// Initialisation de la variable d'erreurs
$errors = array();

if (!empty($_POST)) {
    // Récupération et sanitisation des données du formulaire
    $nickname = htmlspecialchars(trim($_POST['nickname']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Validation des données du formulaire
    if (empty($nickname)) {
        $errors['nickname'] = "Le pseudo est requis.";
    }

    if (empty($password)) {
        $errors['password'] = "Le mot de passe est requis.";
    }

    if (empty($errors)) {
        // Requête préparée pour éviter les injections SQL
        $sql = "SELECT nickname, password FROM users WHERE nickname=:nickname";
        $pdoStatement = $pdo->prepare($sql);

        if ($pdoStatement) {
            $pdoStatement->execute(['nickname' => $nickname]);
            $result = $pdoStatement->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                // Vérification du mot de passe
                if (password_verify($password, $result['password'])) {
                    echo "<div class=\"alert alert-success\" role=\"alert\">Connexion réussie</div>";
                    sleep(1);
                    header('Location: index.php');
                    if (!isset($_SESSION['compte'])) $_SESSION['compte'] = "";
                    $_SESSION['compte'] = $_POST['email'];
                    $_SESSION['compte'] = $nickname;// récupère le psuedo et le met dans session comppte
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
        <label for="nickname">Pseudo :</label><br>
        <input type="text" id="nickname" name="nickname" required placeholder="Pseudo" value="<?php echo htmlspecialchars($nickname ?? '', ENT_QUOTES); ?>"><br>

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required placeholder="Mot de passe"><br>

        <input type="submit" value="Soumettre"><br>
    </form>
</div>

<?php
include 'footer.php';
?>
