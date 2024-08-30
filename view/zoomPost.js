document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.card').forEach(function(card) {
        card.addEventListener('click', function() {
            var cardId = this.getAttribute('data-id');

            fetch('getZoom.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'id=' + cardId
            })
            .then(response => response.text())//response.json())
            .then(data => {
                console.log(data);//sur le fichier zip recu au lieu de date y'a ('data received:', data)
                
                if (data.error) {
                    console.error(data.error);
                } else {
                    document.querySelector('.result').innerHTML = `
                        <div class="zoomCard">
                            <div class="cardHeader">
                                <div class="cardPseudo">${data.nickname}</div>
                                <div class="cardCategorieMain">${data.mainCat}</div>
                            </div>
                            <div class="cardInfo">
                                <div class="cardPhoto"><img src="picture/photos/${data.picture}.jpg"</div>
                                <div class="cardInfoCol">
                                    <div class="cardInfoRow">
                                        <div class="cardInfoTitle">Civil</div>
                                        <div class="cardInfoValue">${data.name}</div>
                                    </div>
                                    <div class="cardInfoRow">
                                        <div class="cardInfoTitle">Âge</div>
                                        <div class="cardInfoValue">${data.age} ans</div>
                                    </div>
                                    <div class="cardInfoRow">
                                        <div class="cardInfoTitle">Nationalité</div>
                                        <div class="cardInfoValue">${data.country}</div>
                                    </div>
                                    <div class="cardInfoRow">
                                        <div class="cardInfoTitle">Langue de stream</div>
                                        <div class="cardInfoValue">${data.language}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="cardSlotContainer">
                                <div class="cardSlot">
                                    <div class="slotTitle">ACTIVITÉ RÉCENTE</div>
                                    <div class="slotContent">
                                        <iframe width="168" height="95" src="https://www.youtube.com/embed/${data.videoOne}" frameborder="0" allowfullscreen></iframe>
                                        <iframe width="168" height="95" src="https://www.youtube.com/embed/${data.videoTwo}" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                                <div class="cardSlot">
                                    <div class="slotContent">${data.factOne}</div>
                                </div>
                                <div class="cardSlot">
                                    <div class="slotContent">${data.factTwo}</div>
                                </div>
                                <div class="cardSlot">
                                    <div class="slotContent">${data.factThree}</div>
                                </div>
                            </div>
                        </div>
                    `;
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});
