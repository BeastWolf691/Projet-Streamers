#Route à suivre pour que le projet fonctionne

Démarrage
composer install    -> création du dossier vendor
CREER SI IL NEXISTE PAS UN .GITIGNORE AVEC  /vendor/                 !!!
aller dans php my admin     create database stream

retour dans vscode
php bin/doctrine orm:validate-schema

Erreur normale: [ERROR] The database schema is not in sync with the current mapping file.

php bin/doctrine orm:schema-tool:create   si c'est pas vert c'est que tu es daltonien 

aller dans php my admin, 
-- créer la database "stream"

-- Créer la table 'cards'
CREATE TABLE cards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50),
    MainCat VARCHAR(50),
    Categories VARCHAR(50),
    picture VARCHAR(255),
    name VARCHAR(50),
    language VARCHAR(50),
    PYoutube VARCHAR(255),
    Ptwitch VARCHAR(255),
    PKick VARCHAR(255),
    PTwitter VARCHAR(255),
    PInstagram VARCHAR(255),
    PTiktok VARCHAR(255),
    videoOne VARCHAR(255),
    videoTwo VARCHAR(255),
    factOne TEXT,
    factTwo TEXT,
    factThree TEXT
);
copier colle l'entieretée du fichier bdd.sql dans l'onglet sql
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

