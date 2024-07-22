<?php
include 'header.php';

if (!empty($_POST)) {



    $errors = array();

    $nickname = htmlspecialchars($_POST['nickname']);
    $password = htmlspecialchars($_POST['password']);
    $sql = "SELECT nickname, password FROM users WHERE nickname=:val"; // val  est un motif

    $pdoStatement = $pdo->prepare($sql);
    if ($pdoStatement) {
        $pdoStatement->execute(['val' => $nickname]); // transforme le motif
        $result = $pdoStatement->fetch();
        // on veut comparer le mot de passe saisie depuis le formulaire avec
        // le mot de passe haché récupéré depuis la base de do nnées

        if ($result) {
            if (password_verify($password, $result->password)) {
                echo "<div class=\"alert alert-success\" role=\"alert\">Connexion réussie</div>";

                sleep(1);
                header('location:index.php');
            } else {
                $errors['password'] = "Mot de passe invalide";
            }
        } else {
            $errors['name'] = "Identifiant invalide";
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
        <input type="text" id="nickname" name="nickname" required placeholder="Pseudo">

        <label for="password">Mot de passe :</label><br>
        <input type="password" id="password" name="password" required placeholder="Mot de passe">

        <!--   <label for="feedback">Commentaires :</label><br>
        <input type="text" id="feedback" name="feedback" required><br> -->

        <input type="submit" value="Soumettre"><br>
    </form>
</div>

<?php
include 'footer.php';
?>