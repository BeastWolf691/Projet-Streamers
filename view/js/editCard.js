
$(document).ready(function () {
    $('.modal').hide();
    $('.edit-button').click(function () {
        $('.modal').show();
    });
    $('.close-button').click(function () {
        $('.modal').hide();
    });
});