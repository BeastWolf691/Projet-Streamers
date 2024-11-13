
$(document).ready(function () {
    $('.modal').hide();
    $('.edit-button').click(function () {
        $('.modal').show();
    });
    $('.close-button').click(function () {
        $('.modal').hide();
    });
});
// Attache un écouteur d'événement sur chaque bouton d'édition
document.querySelectorAll('.edit-button').forEach(button => {
    button.addEventListener('click', function() {
        const cardId = this.getAttribute('data-id');
        fetchCardDetails(cardId); // Appel à la fonction pour charger les données de la carte
    });
});

// Fonction pour récupérer les informations de la carte
function fetchCardDetails(id) {
    fetch(`getCard.php?id=${id}`)
        .then(response => {
            console.log("Réponse brute reçue :", response); // Affiche la réponse
            return response.json();
        })
        .then(data => {
            console.log("Données JSON reçues :", data); // Affiche les données pour le debug
            if (data.error) {
                console.error('Erreur de chargement des données :', data.error);
                return;
            }
            // Remplissez les champs de la modal avec les données récupérées
            document.getElementById('nickname').value = data.nickname;
            document.getElementById('factone').value = data.factone;
            document.getElementById('facttwo').value = data.facttwo;
            document.getElementById('factthree').value = data.factthree;
            // Affichez la modal
            document.getElementById('editModal').style.display = 'block';
        })
        .catch(error => console.error('Erreur :', error));
}