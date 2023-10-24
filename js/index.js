document.addEventListener("DOMContentLoaded", () => {
  document.querySelector("#rememberLink").addEventListener("click", (e) => {
    e.preventDefault();
    document.querySelector("#formLogin").classList.add("d-none");
    document.querySelector("#formRemember").classList.remove("d-none");
    document.querySelector("#formRemember input").focus();
  });  
});

function handleClick(component, destLink) {
  document.addEventListener("DOMContentLoaded", () => {
    document.querySelector(component).addEventListener("click", (e) => {
      e.preventDefault();
      window.location.href = destLink;
    });  
  });
}

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
