<?php
include 'header.php';

$errors = [];
$name = $lastName = $nickname = $mail = $birthday = $dateToSign = $deck = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et sanitisation des données du formulaire
    $name = htmlspecialchars(trim($_POST['name']));
    $lastName = htmlspecialchars(trim($_POST['lastName']));
    $nickname = htmlspecialchars(trim($_POST['nickname']));
    $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_EMAIL);
    $birthday = htmlspecialchars(trim($_POST['birthday']));
    $dateToSign = htmlspecialchars(trim($_POST['dateToSign']));
    $deck = htmlspecialchars(trim($_POST['deck']));
    $password = $_POST['password'];
    $cgu = isset($_POST['cgu']) ? true : false;

    // Validation des champs
    if (empty($name)) {
        $errors['name'] = "Le nom est requis.";
    }
    if (empty($lastName)) {
        $errors['lastName'] = "Le prénom est requis.";
    }
    if (empty($nickname)) {
        $errors['nickname'] = "Le pseudo est requis.";
    }
    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errors['mail'] = "Un mail valide est requis.";
    }
    if (empty($password)) {
        $errors['password'] = "Le mot de passe est requis.";
    }
  
    // Si aucune erreur, on continue avec le hashage du mot de passe et l'insertion dans la base de données
    if (empty($errors)) {
        $passwordHache = password_hash($password, PASSWORD_DEFAULT);

        // Requête préparée pour éviter les injections SQL
        $req = $pdo->prepare("INSERT INTO users (name, lastName, nickname, password, mail, birthday, dateToSign, deck) VALUES (:name, :lastName, :nickname, :password, :mail, :birthday, :dateToSign, :deck)");
        $req->execute([
            'name' => $name,
            'lastName' => $lastName,
            'nickname' => $nickname,
            'password' => $passwordHache,
            'mail' => $mail,
            'birthday' => $birthday,
            'dateToSign' => $dateToSign,
            'deck' => $deck
        ]);

        header('Location: logIn.php');
        exit();
    }
}
?>

<div class="form">
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
    <form action="" method="post" class="form-container">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES); ?>" required>

        <label for="lastName">Prénom</label>
        <input type="text" name="lastName" id="lastName" value="<?php echo htmlspecialchars($lastName, ENT_QUOTES); ?>" required>

        <label for="mail">Mail</label>
        <input type="email" name="mail" id="mail" value="<?php echo htmlspecialchars($mail, ENT_QUOTES); ?>">

        <label for="nickname">Pseudo</label>
        <input type="text" name="nickname" id="nickname" value="<?php echo htmlspecialchars($nickname, ENT_QUOTES); ?>" required>

        <label for="birthday">Anniversaire</label>
        <input type="date" name="birthday" id="birthday" style="width: 90%; border-radius: 4px; border: 1px solid #ccc; padding:10px" value="<?php echo htmlspecialchars($birthday, ENT_QUOTES); ?>">

        <label for="dateToSign">Date d'enregistrement</label>
        <input type="date" name="dateToSign" id="dateToSign" style="width: 90%; border-radius: 4px; border: 1px solid #ccc; padding:10px" value="<?php echo htmlspecialchars($dateToSign, ENT_QUOTES); ?>">

        <label for="password">Mot de passe</label>
        <input type="password" name="password" style="width: 90%; border-radius: 4px; border: 1px solid #ccc" id="password" required>

        <label for="deck">Deck</label>
        <input type="text" name="deck" id="deck" value="<?php echo htmlspecialchars($deck, ENT_QUOTES); ?>">

        <input type="checkbox" id="cgu" name="cgu"  required>
        <label for="cgu">J'accepte les <a href="cgu.php">Conditions Générales d'Utilisation</a></label>
       
        <input type="submit" value="Soumettre">

    </form>
</div>

<?php
include 'footer.php';
?>
