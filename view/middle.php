<head>
    <meta charset="utf-8">
    <title>prototype V1</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/e2e1900fed.js" crossorigin="anonymous"></script><!--permet d'avoir accès à des icones gratuites-->
    <link rel="stylesheet" media="screen and (min-width: 981px)" href="../css/desk.css" />
    <link rel="stylesheet" media="screen and (max-width: 980px)" href="../css/tablet.css" />
    <link rel="stylesheet" media="screen and (max-width: 600px)" href="../css/mobil.css" />

<body>
    <div id="middle">
        <div class="filter-bar">
            <div class="filter-item">
                <label id="category" for="type">Genre</label>
                <select id="type" name="type">
                    <option value=""></option>
                    <option value="sport">sport</option>
                    <option value="cuisine">cuisine</option>
                    <option value="jeux videos">jeux vidéos</option>
                    <option value="urbex">urbex</option>
                </select>
            </div>

            <div class="filter-item">
                <label for="names">Streamers/euses&nbsp;</label>
                <select id="names" name="names">
                    <option value=""></option>
                </select>
            </div>

            <div class="filter-item">
                <label for="date">Date de création&nbsp;</label>
                <select id="date" name="date">
                    <option value=""></option>
                    <option value="2005">depuis 2005</option>
                    <option value="2010">depuis 2010</option>
                    <option value="2015">depuis 2015</option>
                    <option value="2020">depuis 2020</option>
                </select>
            </div>

            <div class="filter-item">
                <label id="speak" for="languages">Langues</label>
                <select id="languages" name="languages">
                    <option value=""></option>
                    <option value="fr">français</option>
                    <option value="en">anglais</option>
                    <option value="spa">espagnol</option>
                    <option value="ita">italien</option>
                </select>
            </div>

            <div class="filter-item">
                <button type="button" class="btn btn-primary">Appliquer</button>
            </div>
        </div>
        <!-- <div class="resultat">
            Résultat + infos
        </div> -->

        <div class="contenu">
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <div class="card"></div>
            <!--  ici se trouvera le contenu tableau des influenceurs
            avec les informations liées (profil, photo, date de naissance ?, récap du contenu qu'il fait,
            depuis quand il a commencé, liens + icones des différents réseaux qu'il a, et récap de son profil
            (background du perso))
            Nom Followers Instagram
            Nicocapone 8,7M<br>
            SqueeZie 7,8 M<br>
            Norman Thavaud 6 M<br>
            Cyprien 6 M<br>
            Enjoy Phoenix 5,6 M<br>
            Seanfreestyle 5,5 M<br>
            Tibo InShape 4,8 M<br>
            Caroline Receveur 4,8 M<br>
            Mister V 4,5 M<br>
            Michou 4,1 M<br>
    Natoo 3,9 M<br>
            Mcfly 3,7 M<br>
            Lena situations 3,7 M<br>
            Inoxtag 3,6 M<br>
            Carlito 3,3 M<br>
            Stephdurant 3,2 M<br>
            Jujufitcats 3,1 M<br>
            Seb la Frite 3 M<br>
            Amixem 2,8 M<br>
            Joyca 2,8 M<br>
            The doll beauty 2,9 M<br>
            Sananas 2,6 M<br>
            Le Vrai Bouseuh 2,3 M<br>
            Le Rire Jaune 2,2 M<br>
            L’atelier de Roxane 2,1 M<br>
            Mastuu 2,1 M<br>
            Hugo Decrypte 2 M<br>
            Sonia Tlev 1,9 M<br>
            FastGoodCuisine 1,9 M<br>
            Paolalct 1,8 M<br>
            Emma CakeCup 1,7 M<br>
            GaelleGD 1,6 M<br>
            IbraTV 1,6 M<br>
            Romy 1,6 M<br>
            Andy Rowski 1,5 M<br>
            Sissy MUA 1,5 M<br>
            Valouzz 1,5 M<br>
            Cyril MP4 1,5 M<br>
            Juste Zoé 1,4 M<br>
            Henri Tran 1,4 M<br>
            Horia 1,4 M<br>
            Shera Kerienski 1,4 M<br>
            LufyMakesYouUp 1,3 M<br>
            Elsa Bois 1,3 M<br>
            Maxenss 1,3 M<br> 
            Gotaga 1,3 M<br>
            VodK 1,2 M<br>
            Hugo tout seul 1,2 M<br>
            Sulivan Gwed 1,2 M<br>
            WassFreestyle 1,1 M<br>
            Emy LTR 1,1 M<br>
            Sundy Jules 1,1 M<br>
            Sandrea26 1,1 M<br>
            Doigby 1,1 M<br>
            Pierre Croce 1,1 M<br>
            Clara Marz 1,1 M<br> -->
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>