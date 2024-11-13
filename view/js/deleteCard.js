$(document).ready(function() {
    $('.delete-button').click(function() {
        var id = $(this).data('id'); // Récupérer l'ID à partir de l'attribut data-id

        if (confirm('Êtes-vous sûr de vouloir supprimer cet élément ?')) {
            $.ajax({
                url: '../admin/deleteCard.php', 
                method: 'GET',
                data: { id: id },
                success: function(response) {
                    alert('Élément supprimé');
                    location.reload(); 
                },
                error: function() {
                    alert('Une erreur est survenue lors de la suppression.');
                }
            });
        }
    });
});