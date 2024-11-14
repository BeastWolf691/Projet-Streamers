
$(document).ready(function () {
    $('.modal').hide();

    // Attache un écouteur d'événement sur chaque bouton d'édition
    $('.edit-button').click(function () {
        const cardId = $(this).data('id');
        fetchCardDetails(cardId); // Appel à la fonction pour charger les données de la carte
        $('.modal').show();
    });

    //Fermer le modal
    $('.close-button').click(function () {
        $('.modal').hide();
    })


    // Fonction pour récupérer les informations de la carte
    function fetchCardDetails(id) {
        $.ajax({//ajax permet d'avoir une interface plus fluide et réactive et évite rechargement complet de l'interface
            url: `../admin/getCard.php?id=${id}`,  // L'URL de ton endpoint
            method: 'GET',  // Méthode HTTP
            dataType: 'json',  // Attends une réponse JSON
            success: function (data) {
                console.log("Données JSON reçues :", data); // Affiche les données pour le debug
                if (data.error) {
                    console.error('Erreur de chargement des données :', data.error);
                    return;
                }
                // Remplissez les champs de la modal avec les données récupérées
                $('#nickname').val(data.nickname);
                $('#mainCat').val(data.mainCat);
                $('#secondCat').val(data.secondCat);
                $('#thematics').val(data.thematic);
                $('#picture').val(data.picture);
                $('#name').val(data.name);
                $('#languages').val(data.languages);
                $('#pYoutube').val(data.pYoutube);
                $('#pTwitch').val(data.pTwitch);
                $('#pKick').val(data.pKick);
                $('#pTwitter').val(data.pTwitter);
                $('#pInstagram').val(data.pInstagram);
                $('#pTiktok').val(data.pTiktok);
                $('#factone').val(data.factone);
                $('#facttwo').val(data.facttwo);
                $('#factthree').val(data.factthree);

                // Affichez la modal
                $('#edit-modal').show();
            },
            error: function (error) {
                console.log('erreur:', error);
            }
        });
    }

    // Soumettre les modifications du formulaire
    $('#edit-modal form').submit(function (event) {
        event.preventDefault(); // Empêche la soumission classique du formulaire

        // Récupérer les valeurs des champs du formulaire
        const formData = {
            id: $('.edit-button').data('id'), // ID de la carte concernée (tu peux l'ajouter ici ou utiliser un attribut spécifique dans ton modal)
            nickname: $('#nickname').val(),
            mainCat: $('#mainCat').val(),
            secondCat: $('#secondCat').val(),
            thematic: $('#thematics').val(),
            picture: $('#picture').val(),
            name: $('#name').val(),
            languages: $('#languages').val(),
            pYoutube: $('#pYoutube').val(),
            pTwitch: $('#pTwitch').val(),
            pKick: $('#pKick').val(),
            pTwitter: $('#pTwitter').val(),
            pInstagram: $('#pInstagram').val(),
            pTiktok: $('#pTiktok').val(),
            factone: $('#factone').val(),
            facttwo: $('#facttwo').val(),
            factthree: $('#factthree').val()
        };
        // Envoi des données via AJAX pour mettre à jour la carte
        $.ajax({
            url: 'updateCard.php',  // L'URL de ton script de mise à jour
            method: 'POST',  // Méthode HTTP
            data: formData,  // Envoie les données du formulaire
            success: function (response) {
                console.log("Réponse de mise à jour:", response);
                if (response.success) {
                    alert('Carte mise à jour avec succès!');
                    // Ferme la modal après la mise à jour
                    $('.modal').hide();
                } else {
                    alert('Erreur lors de la mise à jour de la carte');
                }
            },
            error: function (error) {
                console.log('Erreur:', error);
            }
        });
    });
});