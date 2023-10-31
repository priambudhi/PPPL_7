// Toggle class active
const navbarNav = document.querySelector(".navbar-nav");
// Ketika sabi menu di klik
document.querySelector("#sabi-menu").onclick = () => {
  navbarNav.classList.toggle("active");
};

// Klik di luar sidebar untuk menghilangkan nav
const sabi = document.querySelector("#sabi-menu");

document.addEventListener("click", function (e) {
  if (!sabi.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});
