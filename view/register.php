<?php 
include 'header.php';
?>
<form action="" method="post">

    <label for="name">Nom</label>
    <input type="text" name="name" id="name">

    <label for="lastName">Prénom</label>
    <input type="text" name="lastName" id="lastName">

    <label for="mail">Mail</label>
    <input type="mail" name="mail" id="mail">

    <label for="username">Pseudo</label>
    <input type="text" name="username" id="username">

    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password">

    <label for="confirmPassword">Confirmer mdp</label>
    <input type="confirmPassword" name="confirmPassword" id="confirmPassword">

    <input type="checkbox" name="cgu" id="cgu" require>J'ai lu les CGU

    <input type="submit" value="Connexion">

    <!-- mettre un captcha en php -->
</form>

<?php 
include 'footer.php';
?>