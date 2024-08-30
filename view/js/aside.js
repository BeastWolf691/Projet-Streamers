$(document).ready(function () {
    console.log('aside.js')
    $('.filter-item select').on('change', function () {

        let type = $('#type').val().toLowerCase();
        let categoryS = $('#categoryS').val().toLowerCase();
        let thematic = $('#thematic').val().toLowerCase();
        let age = $('#ages').val();
        let names = $('#names').val().toLowerCase();
        let languages = $('#languages').val().toLowerCase();

        $('.card').each(function () {
            let mainCat = $(this).data('info').toLowerCase();
            let secondCat = $(this).data('second').toLowerCase();
            let cardThematic = $(this).data('thematic') ? $(this).data('thematic').toLowerCase() : ''; // Récupérer la thématique de la carte, avec une vérification de null/undefined
            let cardAge = parseInt($(this).data('age')); 

            let match = true;

            if (type && !mainCat.includes(type)) {
                match = false;
            }
            if (categoryS && !secondCat.includes(categoryS)) {
                match = false;
            }
            if (thematic && thematic !== cardThematic) {
                match = false;
            }
            if (age) {
                if (age === "under18" && cardAge >= 18) {
                    match = false;
                } else if (age === "18-35" && (cardAge < 18 || cardAge > 35)) {
                    match = false;
                } else if (age === "over35" && cardAge <= 35) {
                    match = false;
                }
            }
            if (names && !mainCat.includes(names)) {
                match = false;
            }
            if (languages && !mainCat.includes(languages)) {
                match = false;
            }

            if (match) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    //------------------------réinitialiser les filtres---------------------------------------------------------
    $('#filterForm').on('reset', function () {
        // Réinitialise le contenu de middle
        $('.card').show();

        // Remise à zéro des différents filtres
        $('#type').val('');
        $('#categoryS').val('');
        $('#thematic').val('');
        $('#age').val('');
        $('#names').val('');
        $('#languages').val('');

    });

});