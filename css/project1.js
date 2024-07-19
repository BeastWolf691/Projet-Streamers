$(document).ready(function () {
    const menuButton = $("#menu1");
    const overlay = $("#overlay");
    const menu = $("#menu-person");

    // Ouvrir le menu
    menuButton.on("click", function () {
        overlay.addClass("active");
    });

    
    // Fermer le menu lorsqu'on clique sur l'extérieur
    $(document).on("click", function (event) {
        if (!menu.is(event.target) && menu.has(event.target).length === 0 && !menuButton.is(event.target) && menuButton.has(event.target).length === 0) {
            overlay.removeClass("active");
        }
    });

    // Fermer le menu lorsqu'on clique sur les liens
    $("#menu-person a").on("click", function (event) {
        event.preventDefault();
        // Actualise la page
        window.location.href = $(this).attr("href");
    });


    // Fonction pour appliquer la classe en fonction du mode

    // document.getElementById('toggle-dark-mode').addEventListener('change', function() {
    //     var menu = document.querySelector('nav');
    //     if (this.checked) {
    //         menu.classList.add('darker');
    //     } else {
    //         menu.classList.remove('darker');
    //     }
    // });

    function appliquerMode() {
        // Vérifie si le navigateur est en mode sombre
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.body.classList.add('darker');
            document.body.classList.remove('light');
        } else {
            document.body.classList.add('light');
            document.body.classList.remove('darker');
        }
    }

    appliquerMode();
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', appliquerMode);

    // // Quand on clique sur #switch on ajoute la classe dark à #menu.
    let btn = document.querySelector('#switch');

    function toggleDark() {
        let contenu = document.querySelector('.contenu');
        let person = document.querySelector('#menu-person');

        contenu.classList.toggle('dark');
        person.classList.toggle('dark');

        document.body.classList.toggle('darker');
        document.body.classList.toggle('light');
    }

    function toggleBtn() {
        let btnElement = document.getElementById("switch");
        btnElement.classList.toggle('btn-dark'); // Ajoute la classe btn-dark au bouton switch
    }

    btn.addEventListener('click', function() {
        toggleDark();
        toggleBtn();
    });
});