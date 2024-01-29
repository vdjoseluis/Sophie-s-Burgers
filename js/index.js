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

function checkPhone() {
  let phone= document.querySelector("#phone").value;
  let regexPhone= /^[6-7]\d{8}$/;
  if (!regexPhone.test(phone)) {
    alert("Por favor, introduce un número de teléfono válido (9 dígitos que comience con 6 o 7).");
    return false;
  }
  return true;
}