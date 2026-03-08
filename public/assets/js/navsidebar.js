document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');

    if (toggleBtn && sidebar && mainContent) {
        toggleBtn.addEventListener('click', () => {

            sidebar.classList.toggle('collapsed');

            mainContent.classList.toggle('expanded');

            toggleBtn.classList.toggle('active');
        });
    } else {
        console.error("Layout elements not found. Check your IDs.");
    }
});