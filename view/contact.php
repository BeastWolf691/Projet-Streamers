<?php
include 'header.php';
?>
<div class="form-container">
    <form>
        <label for="username">Pseudo</label><br>
        <input type="text" name="username" id="username" required placeholder="Pseudo"><br>

        <label for="username">Mail</label><br>
        <input type="text" name="name" id="name" required placeholder="Mail"><br>

        <label for="category">Objet de la demande</label><br>
        <select id="category" class="form-select" style="width: 98%;">
            <option value="2">Problème de connexion</option>
            <option value="3">Deck invalide</option>
            <option value="4">Autres</option>
        </select><br>

        <label for="feedback">Commentaire </label><br>
        <input type="text" id="feedback" name="feedback" required placeholder="Votre message..."><br>

        <input type="submit" value="Soumettre"><br>

    </form>
</div>
<?php
include 'footer.php';
?>