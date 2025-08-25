        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        document.getElementById('toggleSidebar').addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
        content.classList.toggle('expanded');
    });