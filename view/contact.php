<?php
include 'header.php';

?>
<div class="form-container">

    <form action="" method="post">
        <?php
        if (!empty($_POST)) {
            // Récupérer les données du formulaire
            $nickname = $_POST['nickname'];
            $mail = $_POST['mail'];
            $subject = $_POST['subject'];
            $feedback = $_POST['feedback'];

            // Vérifier que tous les champs obligatoires sont remplis
            if (empty($nickname) || empty($mail) || empty($subject) ) {
                 echo "<div class=\"alert\" role=\"alert\">Tous les champs sont obligatoires</div>";
            } else {
                // Vérifie si le pseudo et l'email existent dans la table users
                $checkUser = $pdo->prepare("SELECT * FROM users WHERE nickname = ? AND mail = ?");
                $checkUser->execute([$nickname, $mail]);
                $user = $checkUser->fetch();

                if ($user) {
                    // Si l'utilisateur existe, insérer les données dans la table contact
                    $req = $pdo->prepare("INSERT INTO contact (nickname, mail, subject, feedback) VALUES (?, ?, ?, ?)");
                    $req->execute([$nickname, $mail, $subject, $feedback]);
                     echo "<div class=\"success\" role=\"alert\">Ajout réussi</div>";
                    sleep(1);
                    header('Location: index.php');
                    exit();
                } else {
                    echo "<div class=\"alert \" role=\"alert\">Pseudo ou mail incorrect</div>";
                }
            }
        }

        ?>
        <label for="nickname">Pseudo</label><br>
        <input type="text" name="nickname" id="nickname" placeholder="Pseudo"><br>

        <label for="mail">Mail</label><br>
        <input type="mail" name="mail" id="mail" placeholder="Mail"><br>

        <label for="subject">Objet de la demande</label><br>
        <select id="subject" name="subject" class="form-select" style="width: 98%;">
            <option value="problem">Problème de connexion</option>
            <option value="deck">Deck invalide</option>
            <option value="other">Autres</option>
        </select><br>

        <label for="feedback">Commentaire </label><br>
        <input type="text" id="feedback" name="feedback" placeholder="Votre message..."><br>

        <input type="submit" value="Soumettre"><br>

    </form>
</div>
<?php
include 'footer.php';
?>