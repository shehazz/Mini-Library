document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.getElementById('ruleCheck');
    const confirmBtn = document.getElementById('confirmBtn');

    if (checkbox && confirmBtn) {
        checkbox.addEventListener('change', function () {
            confirmBtn.disabled = !this.checked;
        });
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);

    
    if (urlParams.get('reservation') === 'success') {
        Swal.fire({
            title: 'Success!',
            text: 'Book reserved successfully!',
            icon: 'success',
            confirmButtonColor: '#34495E'
        });
    }

    
    if (urlParams.get('reservation') === 'failed') {
        Swal.fire({
            title: 'Error!',
            text: 'Database Error: Could not reserve the book.',
            icon: 'error',
            confirmButtonColor: '#E74C3C'
        });
    }
});