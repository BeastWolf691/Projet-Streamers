$(document).ready(function () {
    $('.edit-modal').hide();

    function calculateAge(birthdate) {
        const birth = new Date(birthdate);
        const today = new Date();
        let age = today.getFullYear() - birth.getFullYear();
        const monthDiff = today.getMonth() - birth.getMonth();
        
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birth.getDate())) {
            age--;
        }
        
        return age; 
    }

    $('.edit-button').click(function () {
        const card = $(this).closest('.card');
        const cardId = card.data("id");
        $('#cardId').val(cardId);
        
        const nickname = card.data("nickname");
        const maincat = card.data("info");
        const seconcat = card.data("second");
        const thematic = card.data("thematic");
        const name = card.data("name");
        const languages = card.data("languages");
        const pyoutube = card.data("pyoutube");
        const ptwitch = card.data("ptwitch");
        const pkick = card.data("pkick");
        const ptwitter = card.data("ptwitter");
        const pinstagram = card.data("pinstagram");
        const ptiktok = card.data("ptiktok");
        const factone = card.data("factone");
        const facttwo = card.data("facttwo");
        const factthree = card.data("factthree");
        const birthdate = card.data("birthdate");
        
        $('#nickname').val(nickname);
        $('#mainCat').val(maincat);
        $('#secondCat').val(seconcat);
        $('#thematic').val(thematic);
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
        $('#birthdate').val(birthdate);
        
        $('.edit-modal').show();
    });

    $('#editCardForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = $(this).serialize();
        const birthdate = $('#birthdate').val();
        const age = calculateAge(birthdate);
        
        $.ajax({
            url: 'editCard.php',
            method: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if(response.success) {
                    const cardId = $('#cardId').val();
                    const card = $(`.card[data-id="${cardId}"]`);
                    
                    card.data('nickname', $('#nickname').val());
                    card.data('info', $('#mainCat').val());
                    card.data('second', $('#secondCat').val());
                    card.data('thematic', $('#thematic').val());
                    card.data('name', $('#name').val());
                    card.data('languages', $('#language').val());
                    card.data('pyoutube', $('#pYoutube').val());
                    card.data('ptwitch', $('#pTwitch').val());
                    card.data('pkick', $('#pKick').val());
                    card.data('ptwitter', $('#pTwitter').val());
                    card.data('pinstagram', $('#pInstagram').val());
                    card.data('ptiktok', $('#pTiktok').val());
                    card.data('factone', $('#factOne').val());
                    card.data('facttwo', $('#factTwo').val());
                    card.data('factthree', $('#factThree').val());
                    card.data('birthdate', birthdate);
                    
                    card.find('.cardAge').text(age + ' ans');

                    card.find('.cardHeader').first().contents().filter(function() {
                        return this.nodeType === 3;
                    }).first().replaceWith($('#nickname').val());
                    
                    $('.edit-modal').hide();
                    location.reload();
                } else {
                    alert('Erreur lors de la mise à jour de la carte');
                }
            },
            error: function() {
                alert('Erreur lors de la communication avec le serveur');
            }
        });
    });

    $('.close-button').click(function () {
        $('.edit-modal').hide();
    });
});