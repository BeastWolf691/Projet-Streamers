$(document).ready(function () {
    $('.modal').hide();

    $('.edit-button').click(function () {
        // Récupérer les données de la carte associée
        const card = $(this).closest('.card'); 
        const cardId = card.data("id"); 
        $('#cardId').val(cardId);
        
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

    $('.close-button').click(function () {
        $('.modal').hide();
    });
}); 