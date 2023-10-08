require('dotenv').config();
const googleApiKey= process.env.GOOGLE_MAPS_API_KEY;

document.addEventListener("DOMContentLoaded", () => {
  document.querySelector("#btnToCarta").addEventListener("click", () => {
    window.location.href = "../index.php?content=carta";
  });

  document.querySelector("#btnToMenu").addEventListener("click", () => {
    window.location.href = "../index.php?content=menus";
  });  
});

document.addEventListener("DOMContentLoaded", () => {
  document.querySelector("#btnLogin").addEventListener("click", () => {
    window.location.href = "../views/login.php";
  });
});
document.addEventListener("DOMContentLoaded", () => {
  document.querySelector("#rememberLink").addEventListener("click", (e) => {
    e.preventDefault();
    document.querySelector("#formLogin").classList.add("d-none");
    document.querySelector("#formRemember").classList.remove("d-none");
    document.querySelector("#formRemember input").focus();
  });

  document.querySelector("#btnLogin2").addEventListener("click", () => {
    window.location.href = "../views/login.php";
  });
});

document.addEventListener("DOMContentLoaded", () => {
  document.querySelector("#btnCancel").addEventListener("click", (e) => {
    e.preventDefault();
    window.location.href = "/index.php";
  });
});

function hideLink(currentLink) {
  const mainLinks = document.querySelectorAll(".main-bar ul li a");
  const altLinks = document.querySelectorAll(".alt-bar ul li a");

  mainLinks.forEach((element) => {
    if (element.textContent === currentLink) {
      element.style.display = "none";
    }
  });
  altLinks.forEach((element) => {
    if (element.textContent === currentLink) {
      element.style.display = "none";
    }
  });
}
