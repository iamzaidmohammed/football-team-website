const formContainer = document.querySelector(".add-player-container");
const addBtn = document.querySelector("span.add-player");
const closeBtn = document.querySelector(".add-close");

// Add your event listeners for add buttons here
addBtn.addEventListener("click", () => {
  formContainer.style.display = "block";
});

closeBtn.addEventListener("click", () => {
  formContainer.style.display = "none";
});
