<?php
session_start();
include '../bdd.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>prototype V1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://kit.fontawesome.com/e2e1900fed.js" crossorigin="anonymous"></script>
    <script type="module" src="../js/zoomPost.js"></script>
    <script type="module" src="../js/index.js"></script><!-- type module TRES IMPORTANTS, SINON LES IMPORTS NE FONCTIONNENT PAS, c'est une norme ES6 -->

    <link rel="stylesheet" media="screen and (min-width: 981px)" href="../css/desk/index.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div id="banner">
            <a href="./">
                <div class="img" id="logo-container"></div>
            </a>
            <nav>
                <ul id="menu-top">
                    <li><a href="index.php" >Accueil</a></li>
                    <li><a href="contact.php" >Contacts</a></li>
                    <li><a href="aboutUs.php" >Qui sommes nous</a></li>
                </ul>
            </nav>
            <div class="icones">
                <i class="fa-sharp fa-solid fa-moon fa-rotate-300 fa-xl" id="sunny" style="color: #52525b;"></i>
                <i class="fa-solid fa-sun fa-rotate-300 fa-xl" id="darkness" style="color: #FFD700;"></i>
            </div>
            <div id="searchbar">
                <input id="search-input" type="search" placeholder="Recherche">
            </div>
            <div class="bienvenue">
                <?php
                if (isset($_SESSION['compte'])) {
                    if (isset($_SESSION['name'])) {
                        $compte = ucfirst($_SESSION['name']);
                    } else {
                        $compte = ucfirst($_SESSION['compte']);
                    }
                ?>
                    <p> Bonjour <?= $compte ?> ! <a href="./logout.php">Déconnexion</a></p>
                <?php
                } else {
                    echo "<p> </p>";
                }
                ?>
            </div>
            <div id="person">
                <div id="overlay">
                    <ul id="menu-person">
                        <?php if (isset($_SESSION['compte'])) { ?>
                            <i class="fa-solid fa-user fa-2xl" id="menu-persona"></i>
                        <?php } else { ?>
                            <li><a href="./logIn.php">Connexion</a></li>
                            <li><a href="./register.php">Inscription</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </header>