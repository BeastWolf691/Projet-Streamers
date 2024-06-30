$(document).ready(function() {
    const menuButton = $("#menu1");
    const overlay = $("#overlay");
    const menu = $("#menu-person");

    // Ouvrir le menu
    menuButton.on("click", function() {
        overlay.addClass("active");
    });

    // Fermer le menu lorsqu'on clique sur l'extérieur
    $(document).on("click", function(event) {
        if (!menu.is(event.target) && menu.has(event.target).length === 0 && !menuButton.is(event.target) && menuButton.has(event.target).length === 0) {
            overlay.removeClass("active");
        }
    });

    // Fermer le menu lorsqu'on clique sur les liens
    $("#menu-person a").on("click", function(event) {
        event.preventDefault();
        // Actualise la page
        window.location.href = $(this).attr("href");
    });
});

