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

## Dernières modifications
### Alexis
* Nouvelle div dans minicard
* Dans middle.php ligne 117,  ajout d'une div qui prend le changement de background en php( le demi cercle) avant la div maincat et secondcat qui  (cardcss ligne 237) . Pour maincat et secondCat j'ai gardé le code,juste changé la couleur
* Fusion ; refonte du fichier colorBt.php et dans middle.php, changement de lignes 119 et 123 - > souci niveau ligne, je comprends pas ce qui a changé
###### 7/ pour la sécurité avec .env :
il faut installer "composer require vlucas/phpdotenv" c'est une bibliothèque.
faire un fichier .env et mettre les informations de connexion a la bdd dedans, voir ci dessous, c'est vide il faut donc remplir avec vos informations
    DB_HOST= '',
    DB_USER= '',
    DB_PASSWORD= '',
    DB_DB= '',
    DB_PORT= '',
