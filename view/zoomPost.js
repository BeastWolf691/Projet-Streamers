
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.card').forEach(card => {
        card.querySelector('.zoomButton').addEventListener('click', function (event) {
            event.stopPropagation();

            const zoomCard = document.querySelector('.zoomCard');

            // Récupérer les données de la carte cliquée
            const data = card.dataset;

            // Remplir la carte zoom avec les données
            zoomCard.querySelector('.cardPseudo').textContent = data.nickname;
            zoomCard.querySelector('img').src = data.picture !== 'undefined' ? `picture/photos/photo-${data.picture}.jpg` : 'picture/photos/default.jpg';
            zoomCard.querySelector('#valueCivil').textContent = data.name;
            zoomCard.querySelector('#valueAge').textContent = `${data.age} ans`;
            zoomCard.querySelector('#valueFromCountry').textContent = data.languages;
            zoomCard.querySelector('#valueLanguage').textContent = data.languages;

            // Liens URL
            zoomCard.querySelector('#cardYoutube').href = data.pyoutube || '#';
            zoomCard.querySelector('#cardTwitch').href = data.ptwitch || '#';
            zoomCard.querySelector('#cardKick').href = data.pkick || '#';
            zoomCard.querySelector('#cardX').href = data.ptwitter || '#';
            zoomCard.querySelector('#cardInstagram').href = data.pinstagram || '#';
            zoomCard.querySelector('#cardTiktok').href = data.ptiktok || '#';

            // Faits
            zoomCard.querySelector('#fact1').textContent = data.factone || 'Pas d\'anecdote disponible';
            zoomCard.querySelector('#fact2').textContent = data.facttwo || 'Pas d\'anecdote disponible';
            zoomCard.querySelector('#fact3').textContent = data.factthree || 'Pas d\'anecdote disponible';


            // Afficher la carte zoom (si elle est cachée)
            zoomCard.style.display = 'block';
        });
        //ferme la zoomCard en cliquant sur le X
        const closeButton = document.querySelector('.close');
        closeButton.addEventListener('click', () => {
            document.querySelector('.zoomCard').style.display = 'none';
        });
    });
});


