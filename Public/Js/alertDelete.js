function confirmDelete(e, idDispo) {
    e.preventDefault();
    Swal.fire({
        title: 'Supprimer ce créneau ?',
        text: "Cette action est irréversible !",
        icon: 'warning',
        showCancelButton: true,
        background: '#121212', 
        color: '#ffffff',
        confirmButtonColor: '#FF6B00', 
        cancelButtonColor: '#3f3f46', 
        confirmButtonText: 'Oui, supprimer',
        cancelButtonText: 'Annuler',
        borderRadius: '1.5rem',
    }).then((result) => {
        if (result.isConfirmed) {

            window.location.href = `delete_dispo.php?id=${idDispo}`;
            
        }
    })
}