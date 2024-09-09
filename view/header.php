<?php
session_start();
include 'bdd.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>prototype V1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/e2e1900fed.js" crossorigin="anonymous"></script><!--permet d'avoir accès à des icones gratuites-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="module" src="zoomPost.js"></script>
    <script type="module" src="js/index.js"></script><!-- type module TRES IMPORTANTS, SINON LES IMPORT NE FONCTIONNENT PAS, c'est une norme ES6 -->
    <link rel="stylesheet" media="screen and (min-width: 981px)" href="css/desk/index.css" />
    <link rel="stylesheet" media="screen and (max-width: 980px)" href="css/tablet.css" />
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="css/mobil.css" />

</head>

<body>
    <header>
        <div id="banner">
            <a href="#">
                <div class="img" id="logo-container"></div>
            </a><!-- ajout du lien -->
            <div id="star">
                <i class="fa-regular fa-star fa-lg"></i>
            </div>
            <div id="person">
                <i class="fa-solid fa-user fa-2xl" id="menu-top"></i>
                <div id="overlay">
                    <ul id="menu-person">
                        <?php if (isset($_SESSION['compte'])) { ?>
                            <li><a href="./logout.php">Déconnexion</a></li>
                        <?php } else { ?>
                            <li><a href="./logIn.php">Connexion</a></li>
                            <li><a href="./register.php">Inscription</a></li>
                        <?php } ?>

                    </ul>
                </div>
            </div>
        </div>

        <nav>
            <div id="searchbar">
                <input id="search-input" type="search" placeholder="Recherche">
            </div>
            <ul id="menu">
                <li><a href="./index.php" class="neonone">Accueil</a></li>
                <li><a href="./contact.php" class="neontwo">Contacts</a></li>
                <li><a href="#" class="neonone">Qui sommes nous</a></li>
                <li><a href="#" class="neontwo">Les plateformes</a></li>
            </ul>
            <input type="checkbox" name="" id="switch">
        </nav>
    </header>
</body>

</html>