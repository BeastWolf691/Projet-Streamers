<?php
include 'header.php';
?>
<div class="form-container">
    <form>
        <label for="username">Pseudo</label><br>
        <input type="text" name="username" id="username" required placeholder="Pseudo"><br>

        <!-- <label for="username">Prénom</label><br>
        <input type="text" name="name" id="name" required style="width: 98%;"><br> -->

        <label for="username">Mail</label><br>
        <input type="text" name="name" id="name" required placeholder="Mail"><br>

        <label for="category">Catégories</label><br>
        <select class="form-select" style="width: 98%;">
            <option value="1">Mot de passe oublié</option>
            <option value="2">Problème de connexion</option>
            <option value="3">Desk invalide</option>
        </select><br>

        <label for="feedback">Commentaire </label><br>
        <input type="text" id="feedback" name="feedback" required placeholder="Votre message..."><br>

        <input type="submit" value="Soumettre"><br>

    </form>
</div>
<?php
include 'footer.php';
?>