$(document).ready(function () {
    $('.modal').hide();

    // Attache un écouteur d'événement sur chaque bouton d'édition

    $('.edit-button').click(function () {
        const cardId = $(this).data('id');
        fetchCardDetails(cardId); // Appel à la fonction pour charger les données de la carte
        // Récupérer les données de la carte associée
        const card = $(this).closest('.card'); // Trouve la carte parente

        const nickname=card.data("nickname");
        const maincat=card.data("info");
        const seconcat=card.data("second");
        const thematic=card.data("thematic");
        //const picture=card.data("picture");
        const name=card.data("name");
        const languages=card.data("languages");
        const pyoutube=card.data("pyoutube");
        const ptwitch=card.data("ptwitch");
        const pkick=card.data("pkick");
        const ptwitter=card.data("ptwitter");
        const pinstagram=card.data("pinstagram");
        const ptiktok=card.data("ptiktok");
        const factone=card.data("factone");
        const facttwo=card.data("facttwo");
        const factthree=card.data("factthree");
        
        // Remplir les champs du formulaire
        $('#nickname').val(nickname);
        $('#mainCat').val(maincat);
        $('#secondCat').val(seconcat);
        $('#thematic').val(thematic);
        //$('#picture').val(picture);
        $('#name').val(name);
        $('#language').val(languages);
        $('#pYoutube').val(pyoutube);
        $('#pTwitch').val(ptwitch);
        $('#pKick').val(pkick);
        $('#pTwitter').val(ptwitter);
        $('#pInstagram').val(pinstagram);
        $('#pTiktok').val(ptiktok);
        $('#factOne').val(factone);
        $('#factTwo').val(facttwo);
        $('#factThree').val(factthree);
        
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
