document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("overlay");
    const menuBtn = document.getElementById("menuBtn");
    const menuItems = document.querySelectorAll("aside li");
    const main = document.getElementById("main-content");

    menuBtn?.addEventListener("click", toggleSidebar);
    overlay?.addEventListener("click", closeSidebar);

    menuItems.forEach(item => {
        item.addEventListener("click", () => {
            const page = item.dataset.page;

            fetch(`${dashboardData.ajax_url}?action=load_dashboard&page=${page}`)
                .then(res => res.text())
                .then(html => {
                    main.innerHTML = html;

                    menuItems.forEach(i => {
                        i.classList.remove("bg-white/10", "border-l-4", "border-[#3498db]");
                    });

                    item.classList.add("bg-white/10", "border-l-4", "border-[#3498db]");

                    if (window.innerWidth <= 768) closeSidebar();
                });
        });
    });

    function toggleSidebar() {
        sidebar.classList.toggle("-translate-x-full");
        overlay.classList.toggle("hidden");
        overlay.classList.toggle("opacity-0");
    }

    function closeSidebar() {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
        overlay.classList.add("opacity-0");
    }
});
