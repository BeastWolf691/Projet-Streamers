#Route à suivre pour que le projet fonctionne

Démarrage
composer install    -> création du dossier vendor
CREER SI IL NEXISTE PAS UN .GITIGNORE AVEC  /vendor/                 !!!
aller dans php my admin     create database stream

retour dans vscode
php bin/doctrine orm:validate-schema

Erreur normale: [ERROR] The database schema is not in sync with the current mapping file.

php bin/doctrine orm:schema-tool:create   si c'est pas vert c'est que tu es daltonien 

aller dans php my admin, ouvrir la base "stream"
copier colle l'entieretée du fichier bss.sql dans l'onglet sql
ceci crée 3 données de cartes (modèle)


#Route suivie
création d'un fichier  classes
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

