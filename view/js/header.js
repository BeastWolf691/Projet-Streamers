$(document).ready(function () {
    const logoContainer = $('#logo-container');
    const menuButton = $("#persona");
    const overlay = $("#overlay");
    const menu = $("#menu-person");
    const menuTop = $("#menu-top");


    //Caroussel
    const images = [{
        src: "./logo-instagram2neon.png",
        link: "https://www.instagram.com"
    },
    {
        src: "./logo-kick2neon.png",
        link: "https://www.kick.com"
    },
    {
        src: "./logo-tiktok2neon.png",
        link: "https://www.tiktok.com"
    },
    {
        src: "./logo-twitch2neon.png",
        link: "https://www.twitch.tv"
    },
    {
        src: "./logo-x2neon.png",
        link: "https://www.twitter.com"
    },
    {
        src: "./logo-youtube2neon.png",
        link: "https://www.youtube.com"
    }
    ];

    const $carousel = $('<div>').addClass('carousel');

    const $slider = $('<div>').addClass('slider').css({
        '--width': '75px',
        '--height': '75px',
        '--quantity': images.length,
        '--spacing': '40px'
    });

    const $list = $('<div>').addClass('list');

    $.each(images, function (i, image) {
        const $item = $('<div>').addClass('item');
        const $link = $('<a>').attr('href', image.link).attr('target', '_blank');
        const $img = $('<img>').attr('src', `../picture/${image.src}`);
        $link.append($img);
        $item.append($link);
        $list.append($item);
    });

    $slider.append($list);
    $carousel.append($slider);
    $('#logo').append($carousel);

    // Ouvrir le menu
    menuButton.on("click", function () {
        overlay.addClass("active");
    });

    // Fermer le menu lorsqu'on clique sur X
    $(document).on("click", function (event) {
        if ($(event.target).is('.closed'))
            overlay.removeClass("active");
    });

    // Fermer le menu lorsqu'on clique sur les liens
    $("#menu-person a").on("click", function (event) {
        event.preventDefault();
        // Actualise la page
        window.location.href = $(this).attr("href");
    });

    // changement thème logo avec action sombre clair
    const themeDark = "../picture/logo-cd-light.png"; // Logo for light theme
    const themeLight = "../picture/logo-cd-dark.png"; // Logo for dark theme
    const iconMoon = $("#sunny");
    const iconSun = $("#darkness");

    function appliquerMode() {
        const theme = localStorage.getItem('theme');
        if (theme === 'dark') {
            //localStorage permet d'enregistrer directement dans le navigateur de l'utilisateur s'il a choisi sombre ou clair sur une page et répercute sur les autres son choix
            $('body').addClass('darker').removeClass('light');
            $('.content').addClass('dark');
            $('#menu-person').addClass('dark');
            $('menu-top').addClass('menu-top-dark').removeClass('menu-top-light');
            logoContainer.html(`<img src="${themeLight}" alt="Logo dark">`);
            iconMoon.replaceWith(iconSun);
        } else {
            $('body').addClass('light').removeClass('darker');
            $('.content').removeClass('dark');
            $('#menu-person').removeClass('dark');
            $('menu-top').addClass('menu-top-light').removeClass('menu-top-dark');
            logoContainer.html(`<img src="${themeDark}" alt="Logo light">`);
            iconSun.replaceWith(iconMoon);
        }
    }

    appliquerMode();

    $(document).on("click", "#sunny, #darkness", function () {
        const newTheme = localStorage.getItem('theme') === 'dark' ? 'light' : 'dark';
        localStorage.setItem('theme', newTheme);
        appliquerMode();
    });

    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        if (!localStorage.getItem('theme')) {
            localStorage.setItem('theme', 'dark');
            $('#switch').prop('checked', true);
        }
    }

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', function (e) {
        if (!localStorage.getItem('theme')) {
            const newTheme = e.matches ? 'dark' : 'light';
            localStorage.setItem('theme', newTheme);
            appliquerMode();
        }
    });

    //Systeme de filtre par searchbar
    $('#search-input').on('input', function () {
        let searchTerm = $(this).val().toLowerCase();
        $('.card').each(function () {
            let mainCat = $(this).data('info');
            if (mainCat.includes(searchTerm)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });
})

