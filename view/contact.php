<?php
include 'header.php';

if (!empty($_POST)) {
        // $nickname = $_POST['nickname'];
        // $mail = $_POST['mail'];
        // $subject = $_POST['subject'];
        // $commentaire = $_POST['feedback'];

        $req = $pdo->prepare("INSERT INTO contact SET nickname=?,mail=?,subject=?,feedback=?");
        $req->execute([$_POST['nickname'], $_POST['mail'],$_POST['subject'], $_POST['feedback']]);
        echo "<div class=\"alert alert-success\" role=\"alert\">Ajout réussie</div>";
        sleep(1);
        header('location:index.php');  
     }
?>
<div class="form-container">
    <form action="" method="post">
        <label for="nickname">Pseudo</label><br>
        <input type="text" name="nickname" id="nickname" required placeholder="Pseudo"><br>

        <label for="mail">Mail</label><br>
        <input type="mail" name="mail" id="mail" required placeholder="Mail"><br>

        <label for="subject">Objet de la demande</label><br>
        <select id="subject" name="subject" class="form-select" style="width: 98%;" required>
            <option value="problem">Problème de connexion</option>
            <option value="deck">Deck invalide</option>
            <option value="other">Autres</option>
        </select><br>

        <label for="feedback">Commentaire </label><br>
        <input type="text" id="feedback" name="feedback" required placeholder="Votre message..."><br>

        <input type="submit" value="Soumettre"><br>

    </form>
</div>
<?php
include 'footer.php';
?>

