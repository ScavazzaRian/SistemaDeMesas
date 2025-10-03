const toggleBtn = document.querySelector("#toggle-btn");
const mobileToggle = document.querySelector("#mobile-toggle");
const sidebar = document.querySelector("#sidebar");
const overlay = document.querySelector("#sidebar-overlay");

if (toggleBtn) {
  toggleBtn.addEventListener("click", function () {
    sidebar.classList.toggle("expand");
  });
}

if (mobileToggle) {
  mobileToggle.addEventListener("click", function () {
    sidebar.classList.toggle("expand");
    overlay.classList.toggle("active");
  });
}

if (overlay) {
  overlay.addEventListener("click", function () {
    sidebar.classList.remove("expand");
    overlay.classList.remove("active");
  });
}

const sidebarLinks = document.querySelectorAll(".sidebar-link");
sidebarLinks.forEach(link => {
  link.addEventListener("click", function() {
    if (window.innerWidth <= 768) {
      sidebar.classList.remove("expand");
      overlay.classList.remove("active");
    }
  });
});