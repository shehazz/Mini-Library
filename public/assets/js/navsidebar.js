document.addEventListener('DOMContentLoaded', () => {
    const toggleBtn = document.getElementById('toggle-btn');
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('main-content');

    if (toggleBtn && sidebar && mainContent) {
        toggleBtn.addEventListener('click', () => {
            // Toggles the collapse of the sidebar
            sidebar.classList.toggle('collapsed');
            // Toggles the expansion of the content
            mainContent.classList.toggle('expanded');
        });
    } else {
        console.error("Layout elements not found. Check your IDs.");
    }
});