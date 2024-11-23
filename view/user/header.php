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
    <script src="https://kit.fontawesome.com/e2e1900fed.js" crossorigin="anonymous"></script><!--permet d'avoir accès à des icones gratuites-->
    <script type="module" src="../js/zoomPost.js"></script>
    <script type="module" src="../js/index.js"></script><!-- type module TRES IMPORTANTS, SINON LES IMPORTS NE FONCTIONNENT PAS, c'est une norme ES6 -->
    
    <link rel="stylesheet" media="screen and (min-width: 981px)" href="../css/desk/index.css" />
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <!-- <div id="banner">
            <div class="bienvenue">
                <?php
                if (isset($_SESSION['compte'])) {
                    // Vérifier si la session 'name' est définie pour les membres du staff
                    if (isset($_SESSION['name'])) {
                        // Si c'est un membre du staff, on affiche le nom
                        $compte = ucfirst($_SESSION['name']);
                    } else {
                        // Si c'est un utilisateur régulier, on affiche le pseudo
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
            <a href="#">
                <div class="img" id="logo-container"></div>
            </a>ajout du lien -->
        <!-- <div id="star">
                <i class="fa-regular fa-star fa-lg"></i>
            </div>
            <div id="person">

                <i class="fa-solid fa-user fa-2xl" id="menu-top"></i>
                <div id="overlay">
                    <span class="closed">X</span>
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
        </div> -->

        <!--<nav>
            <ul id="menu">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="contact.php">Contacts</a></li>
                <li><a href="aboutUs.php">Qui sommes nous</a></li>
            </ul>
            <div id="searchbar">
                <input id="search-input" type="search" placeholder="Recherche">
            </div>
            <input type="checkbox" name="" id="switch">
             <div id="logo"></div>
        </nav> -->
        <div id="banner">
            <a href="#">
                <div class="img" id="logo-container"></div>
            </a><!-- ajout du lien -->
            <nav>
                <ul id="menu-top">
                    <li><a href="index.php" class="neonone">Accueil</a></li>
                    <li><a href="contact.php" class="neontwo">Contacts</a></li>
                    <li><a href="aboutUs.php" class="neonone">Qui sommes nous</a></li>
                </ul>
            </nav>
            <div class="icones">
                <i class="fa-sharp fa-solid fa-moon fa-rotate-300" id="sunny" style="color: #52525b;"></i>
                <i class="fa-solid fa-sun fa-rotate-300" id="darkness" style="color: #FFD700;"></i>
            </div>
            <div id="searchbar">
                <input id="search-input" type="search" placeholder="Recherche">
            </div>
            <div class="bienvenue">
                <?php
                if (isset($_SESSION['compte'])) {
                    // Vérifier si la session 'name' est définie pour les membres du staff
                    if (isset($_SESSION['name'])) {
                        // Si c'est un membre du staff, on affiche le nom
                        $compte = ucfirst($_SESSION['name']);
                    } else {
                        // Si c'est un utilisateur régulier, on affiche le pseudo
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
                <ul id="menu-person">
                    <?php if (isset($_SESSION['compte'])) { ?>
                        <li><a href="logout.php">Déconnexion</a></li>
                    <?php } else { ?>
                        <li><a href="logIn.php">Connexion</a></li>
                        <li><a href="register.php">Inscription</a></li>
                    <?php } ?>

                </ul>
            </div>

        </div>
    </header>
   