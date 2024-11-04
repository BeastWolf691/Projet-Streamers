
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.card').forEach(card => {
        card.querySelector('.zoomButton').addEventListener('click', function (event) {
            event.stopPropagation();

            const zoomCard = document.querySelector('.zoomCard');
            const close = document.querySelector('.close');

            // Récupérer les données de la carte cliquée
            const data = card.dataset;

            // Remplir la carte zoom avec les données
            zoomCard.querySelector('.cardPseudo').textContent = data.nickname;
            zoomCard.querySelector('img').src = data.picture ? data.picture : 'picture/photos/photo-_default_.jpg';
            zoomCard.querySelector('#valueCivil').textContent = data.name;
            zoomCard.querySelector('#valueAge').textContent = `${data.age} ans`;
            zoomCard.querySelector('#valueFromCountry').textContent = data.languages;
            zoomCard.querySelector('#valueLanguage').textContent = data.languages;


            // Gestion des liens URL
            const platforms = [
                { id: 'cardYoutube', url: data.pyoutube, icon: 'icon-youtube.svg', alt: 'YouTube' },
                { id: 'cardTwitch', url: data.ptwitch, icon: 'icon-twitch.svg', alt: 'Twitch' },
                { id: 'cardKick', url: data.pkick, icon: 'icon-kick.svg', alt: 'Kick' },
                { id: 'cardX', url: data.ptwitter, icon: 'icon-x.svg', alt: 'Twitter' },
                { id: 'cardInstagram', url: data.pinstagram, icon: 'icon-instagram.svg', alt: 'Instagram' },
                { id: 'cardTiktok', url: data.ptiktok, icon: 'icon-tiktok.svg', alt: 'Tiktok' },
            ];

            // Vider les anciennes icônes avant d'ajouter les nouvelles
            const cardInfoUrl = zoomCard.querySelector('.cardInfoUrl');
            cardInfoUrl.innerHTML = ''; // Vide le conteneur avant de le remplir

            platforms.forEach(platform => {
                if (platform.url) {
                    const link = document.createElement('a');
                    link.href = platform.url;
                    link.id = platform.id;
                    link.className = 'cardUrl ' + platform.id;
                    link.target = '_blank';

                    const img = document.createElement('img');
                    img.src = `./picture/icons/${platform.icon}`;
                    img.alt = platform.alt;

                    link.appendChild(img);
                    cardInfoUrl.appendChild(link);
                }
            });
            // Faits
            zoomCard.querySelector('#fact1').textContent = data.factone || 'Pas d\'anecdote disponible';
            zoomCard.querySelector('#fact2').textContent = data.facttwo || 'Pas d\'anecdote disponible';
            zoomCard.querySelector('#fact3').textContent = data.factthree || 'Pas d\'anecdote disponible';


            // Afficher la carte zoom (si elle est cachée)
            zoomCard.style.display = 'block';
            close.style.display = 'block';
        });
        //ferme la zoomCard en cliquant sur le X
        const closeButton = document.querySelector('.close');
        closeButton.addEventListener('click', () => {
            document.querySelector('.zoomCard').style.display = 'none';
            document.querySelector('.close').style.display = 'none';
        });
    });
});


