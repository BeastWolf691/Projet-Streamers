<?php 
include 'header.php';
?>
<h1>Ajout d'une Carte</h1>
<form action="" method="post">

    <label for="Name">Nom</label>
    <input type="text" name="Name" id="Name">

    <label for="creator">Créateur</label>
    <input type="text" name="creator" id="creator">

    <select multiple>
        <option selected>Catégorie 1</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three Viva L'algérie</option>
    </select>

    <input type="submit" value="Ajouter">

</form>

<?php 
include 'footer.php';
?>
<!-- ce fichier sera mis a jour en fonction du retour d'Axel -->