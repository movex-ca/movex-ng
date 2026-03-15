/* =========================================================
   MOVEX 9JA DASHBOARD SHARED JS
   Handles mobile sidebar open/close
   ========================================================= */

document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const overlay = document.getElementById("sidebarOverlay");
    const openButtons = document.querySelectorAll("[data-menu-open]");
    const closeButtons = document.querySelectorAll("[data-menu-close]");

    function openSidebar() {
        if (sidebar) sidebar.classList.add("show");
        if (overlay) overlay.classList.add("show");
    }

    function closeSidebar() {
        if (sidebar) sidebar.classList.remove("show");
        if (overlay) overlay.classList.remove("show");
    }

    openButtons.forEach(function (button) {
        button.addEventListener("click", openSidebar);
    });

    closeButtons.forEach(function (button) {
        button.addEventListener("click", closeSidebar);
    });

    if (overlay) {
        overlay.addEventListener("click", closeSidebar);
    }

    window.addEventListener("resize", function () {
        if (window.innerWidth >= 1100) {
            closeSidebar();
        }
    });
});