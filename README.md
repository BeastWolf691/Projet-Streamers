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
