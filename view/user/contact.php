<?php
include 'header.php';

$errors = [];
$nickname = '';
$mail = '';
$subject = '';
$feedback = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nickname = htmlspecialchars(trim($_POST['nickname']));
    $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);//nettoyer les email
    $subject = htmlspecialchars(trim($_POST['subject']));
    $feedback = htmlspecialchars(trim($_POST['feedback']));

    if (empty($nickname)) {
        $errors['nickname'] = "Le pseudo est obligatoire.";
    }
    if (empty($mail)) {
        $errors['mail'] = "Le mail est obligatoire.";
    } elseif (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = "Le mail n'est pas valide.";
    }
    if (empty($subject)) {
        $errors['subject'] = "Le sujet est obligatoire.";
    }
    if (empty($feedback)) {
        $errors['feedback'] = "Le commentaire est obligatoire.";
    }

    if (empty($errors)) {
        //requetes préparées
        $checkUser = $pdo->prepare("SELECT * FROM users WHERE nickname = :nickname AND mail = :mail");
        $checkUser->execute(['nickname' => $nickname, 'mail' => $mail]);
        $user = $checkUser->fetch();

        // Si l'utilisateur existe, insérer les données dans la table contact
        $req = $pdo->prepare("INSERT INTO contact (nickname, mail, subject, feedback) VALUES (:nickname, :mail, :subject, :feedback)");
        $req->execute(['nickname' => $nickname, 'mail' => $mail, 'subject' => $subject, 'feedback' => $feedback]);
        echo "<div class=\"alert alert-success\" role=\"alert\">Ajout réussi</div>";
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
    <form action="" method="post">
        <label for="nickname">Pseudo</label><br>
        <input type="text" name="nickname" id="nickname" placeholder="Pseudo" value="<?php echo htmlspecialchars($nickname, ENT_QUOTES); ?>"><br>

        <label for="mail">Mail</label><br>
        <input type="email" name="mail" id="mail" placeholder="Mail" value="<?php echo htmlspecialchars($mail, ENT_QUOTES); ?>"><br>

        <label for="subject">Objet de la demande</label><br>
        <select id="subject" name="subject" class="form-select" style="width: 95%; border-radius: 4px; border: 1px solid #ccc; padding:10px">
            <option value="problem" <?php if ($subject == 'problem') echo 'selected'; ?>>Problème de connexion</option>
            <option value="deck" <?php if ($subject == 'deck') echo 'selected'; ?>>Deck invalide</option>
            <option value="other" <?php if ($subject == 'other') echo 'selected'; ?>>Autres</option>
        </select><br>

        <label for="feedback">Commentaire </label><br>
        <input type="text" id="feedback" name="feedback" placeholder="Votre message..." value="<?php echo htmlspecialchars($feedback, ENT_QUOTES); ?>"><br>

        <input type="submit" value="Soumettre"><br>
    </form>
</div>
<?php
include 'footer.php';
?>
