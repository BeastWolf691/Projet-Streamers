<?php
include 'header.php';
if (!empty($_POST)) {
    $password = $_POST['password'];
    $passwordHache = password_hash($password, PASSWORD_DEFAULT);

    if (empty($errors)) {
        $req = $pdo->prepare("INSERT INTO users SET name=?,lastName=?,nickname=?,password=?,mail=?,birthday=?,dateToSign=?,deck=?");
        $req->execute([$_POST['name'], $_POST['lastName'], $_POST['nickname'], $passwordHache, $_POST['mail'], $_POST['birthday'],  $_POST['dateToSign'], $_POST['deck']]);
        sleep(1);
        header('location:logIn.php');
    }
}
?>

<form action="" method="post" class="form-container">

    <label for="name">Nom</label>
    <input type="text" name="name" id="name" required>

    <label for="lastName">Prénom</label>
    <input type="text" name="lastName" id="lastName" required>

    <label for="mail">Mail</label>
    <input type="mail" name="mail" id="mail">

    <label for="nickname">Pseudo</label>
    <input type="text" name="nickname" id="nickname" required>

    <label for="birthday">Anniversaire</label>
    <input type="date" name="birthday" id="birthday">

    <label for="dateToSign">Date d'enregistrement'</label>
    <input type="date" name="dateToSign" id="dateToSign">

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" required>

    <label for="deck">deck</label>
    <input type="text" name="deck" id="deck">

    <!--  <label for="confirmPassword">Confirmer mdp</label>
    <input type="text" name="confirmPassword" id="confirmPassword"> -->

    <!-- <input type="checkbox" name="cgu" id="cgu" require>J'ai lu les CGU -->
    <input type="checkbox" id="cgu" name="cgu" required>
        <label for="cgu">J'accepte les <a href="cgu.php">Conditions Générales d'Utilisation</a></label>
       
    <input type="submit">

</form>
<?php
include 'footer.php';
?>