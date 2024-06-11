<?php
include 'header.php';
?>
<div class="form-container">
    <form>
        <label for="username">Pseudo :</label><br>
        <input type="text" id="username" name="username" required placeholder="Pseudo"><br>

        <label for="password">Mot de passe :</label><br>
        <input type="text" id="password" name="password" required placeholder="Mot de passe"><br>

        <label for="feedback">Commentaires :</label><br>
        <input type="text" id="feedback" name="feedback" required><br>

        <input type="submit" value="Soumettre"><br>
    </form>
</div>

<?php
include 'footer.php';
?>