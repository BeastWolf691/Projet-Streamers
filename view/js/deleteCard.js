document.querySelectorAll('.delete-button').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const cardId = this.getAttribute('data-id');
        
        if (confirm('Êtes-vous sûr de vouloir supprimer cette carte ?')) {
            const formData = new FormData();
            formData.append('id', cardId);
            
            fetch('../admin/deleteCard.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const card = this.closest('.card');
                    card.remove();
                    alert('Carte supprimée avec succès');
                } else {
                    alert('Erreur lors de la suppression: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Une erreur est survenue lors de la suppression');
            });
        }
    });
});