
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('click', function() {
                const zoomCard = document.querySelector('.zoomCard');
                
                // Récupérer les données de la carte cliquée
                const data = this.dataset;

                // Remplir la carte zoom avec les données
                zoomCard.querySelector('.cardPseudo').textContent = data.nickname;
                zoomCard.querySelector('img').src = `picture/photos/photo-${data.picture}.jpg`;
                zoomCard.querySelector('#valueCivil').textContent = data.name;
                zoomCard.querySelector('#valueAge').textContent = `${data.age} ans`;
                zoomCard.querySelector('#valueFromCountry').textContent = data.mainCat;
                zoomCard.querySelector('#valueLanguage').textContent = data.language;

                // Liens URL
                zoomCard.querySelector('#cardYoutube').href = data.pYoutube || '#';
                zoomCard.querySelector('#cardTwitch').href = data.pTwitch || '#';
                zoomCard.querySelector('#cardKick').href = data.pKick || '#';
                zoomCard.querySelector('#cardX').href = data.pTwitter || '#';
                zoomCard.querySelector('#cardInstagram').href = data.pInstagram || '#';
                zoomCard.querySelector('#cardTiktok').href = data.pTiktok || '#';
                zoomCard.querySelector('#cardSnapchat').href = data.pSnapchat || '#';

                // Faits
                zoomCard.querySelector('#fact1').textContent = data.factone || 'Pas d\'anecdote disponible';
                zoomCard.querySelector('#fact2').textContent = data.facttwo || 'Pas d\'anecdote disponible';
                zoomCard.querySelector('#fact3').textContent = data.factthree || 'Pas d\'anecdote disponible';

                // Afficher la carte zoom (si elle est cachée)
                zoomCard.style.display = 'block';
            });
        });
    });

