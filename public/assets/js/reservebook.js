document.addEventListener('DOMContentLoaded', function() {
    const checkbox = document.getElementById('ruleCheck');
    const confirmBtn = document.getElementById('confirmBtn');

    if (checkbox && confirmBtn) {
        checkbox.addEventListener('change', function() {
            confirmBtn.disabled = !this.checked;
        });
    }
});