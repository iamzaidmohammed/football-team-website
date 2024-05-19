const hamburger = document.querySelector(".fa-bars");
const cancel = document.querySelector(".fa-xmark");
const menu = document.querySelector(".menu");

hamburger.addEventListener("click", () => {
  menu.style.display = "flex";
  hamburger.style.display = "none";
  cancel.style.display = "block";
});

cancel.addEventListener("click", () => {
  menu.style.display = "none";
  cancel.style.display = "none";
  hamburger.style.display = "block";
});
