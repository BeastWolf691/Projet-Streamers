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
    <script src="../css/project.js"></script>
    <link rel="stylesheet" media="screen and (min-width: 981px)" href="../css/desk.css" />
    <link rel="stylesheet" media="screen and (max-width: 980px)" href="../css/tablet.css" />
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="../css/mobil.css" />
    <link rel="stylesheet" media="screen and (min-width: 900px)" href="../css/menu_profil.css" />

</head>

<body>

    <header>

        <div id="banniere">
            <div class="wrapper">
                <div class="item item1"><a href=""><img src="./picture/logo-twitch1.png" alt="twitch"></a></div>
                <div class="item item2"><img src="./picture/logo-youtube1.png" alt="youtube"></div>
                <div class="item item3"><img src="./picture/logo-tiktok1.png" alt="tiktok"></div>
                <div class="item item4"><img src="./picture/logo-instagram1.png" alt="instagram"></div>
                
            </div>

            <div id="person">
                <i class="fa-solid fa-user fa-2xl" id="menu1"></i>
                <div id="overlay">
                    <ul id="menu-person">
                        <li><a href="./logIn.php">Connexion</a></li>
                        <li><a href="./register.php">Inscription</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <div id="menu_type">
            <ul id="menu">
                <li><a href="./index.php">Accueil</a></li>
                <li><a href="./contact.php">Contacts</a></li>
                <li><a href="#" onclick="window.open(this.href); return false;">Qui sommes nous</a></li>
                <li><a href="#" onclick="window.open(this.href); return false;">Historique</a></li>
            </ul>
            <button id="switch">Toggle Dark Mode</button>
        </div>

    </header>