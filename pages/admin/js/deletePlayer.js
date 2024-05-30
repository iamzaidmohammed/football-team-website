function initializeEditPlayerFunctionality() {
  const confirmContainer = document.querySelector(".confirm-delete-player");
  const deleteBtn = document.querySelectorAll(".delete");
  const yesBtn = document.querySelector(".yes");
  const noBtn = document.querySelector(".no");

  // Add your event listeners for edit buttons here
  deleteBtn.forEach((button) => {
    button.addEventListener("click", () => {
      confirmContainer.style.display = "block";
    });
  });

  noBtn.addEventListener("click", () => {
    confirmContainer.style.display = "none";
  });
}
