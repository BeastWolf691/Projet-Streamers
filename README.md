# Initialisation du projet

## Création de la base de données (BDD)

#### 1) Dans Visual Studio, créer le dossier "vendor" :
<b>[Terminal]</b> composer install

#### 2) /!\ IMPORTANT /!\ CRÉER, S'IL N'EXISTE PAS, UN .GITIGNORE :
Inclure <b>/vendor/</b> dans le .gitignore

#### 3) Dans phpMyAdmin, entrer la commande :
<b>[SQL]</b> CREATE DATABASE stream;

#### 4) Dans Visual Studio, valider le schéma pour la BDD :
<b>[Terminal]</b> php bin/doctrine orm:validate-schema

<i><b>Remarque :</b> Ne pas tenir compte de l'erreur suivante : <b>[ERROR] The database schema is not in sync with the current mapping file</b></i>

#### 5) Créer la BDD sur phpMyAdmin :
<b>[Terminal]</b> php bin/doctrine orm:schema-tool:create

#### 6) Remplir la BDD :
Copier-coller l'entièreté du fichier <b>bdd.sql</b> dans l'onglet "SQL"


## Route suivie
création d'un fichier classes
<ul>
    <li>Admin</li>
    <li>Cards</li>
    <li>Categories</li>
    <li>Creator</li>
    <li>Pictures</li>
    <li>Users</li>
</ul>
Création des namesspace

mise en place de orm  & Mise en place des cardinalités 

Création des constructeurs 

Récupération du dossier bin et du fichier bootstrap.php ( ancien projet)

! quand la base de données sera créee il faudra penser à modifier le nom de la base 
dans bootstrap.php ligne 20

simluation de création de BDD ( la vraie sera plus tard)
php my admin     create database stream

retour dans vscode
php bin/doctrine orm:validate-schema

Erreur normale: [ERROR] The database schema is not in sync with the current mapping file.

php bin/doctrine orm:schema-tool:create

30.06
J'ai mis des couleurs dégueulasses poour voir si cela fonctionne, je laisserais mettre les bonnes.

Le code javascript qui fonctionne que dans middle.php ( j'ai essaié de le mettre en .js mais ca ne marchait pas)

Le code détecte que je suis en mode sombre ou clair. les classes darker et light

J'ai ensuite fait un bouton (#switch) qui quand on appuie change la couleur du menu, du filtre, middle, footer et logo person. Cela garde en mémoire grace a LocalStorage qui "enregistre" le choix de l'user.

pour ajouter un changement de couleur il faut ajouter ces lignes dans ici que j'ai commenté en JS


let truk = document.querySelector('.filter-bar')
 truk.classList.toggle('dark')

23.07
Création de la classe/table contact,   il faut donc refaire la base de données

contact.php est soumis uniquement si le pseudo et le mail sont connus de notre base de donnée

dans le css à la fin j'ai ajouté une classe pour gérer les erreurs php.
Ajout de l'action que la searchbar permet de chercher directement dans les card les informations souhaitées.

24.07 et 25/07
ajout case CGU et préparation du fichier CGU pour consultation
