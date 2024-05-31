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

document.addEventListener("DOMContentLoaded", () => {
  const addPlayerForm = document.querySelector("#add-player-form");
  const error = document.querySelector(".add-player-error-message");

  addPlayerForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(addPlayerForm);

    try {
      // Send a POST request to the PHP script
      const response = await fetch("php/addPlayer.php", {
        method: "POST",
        body: formData,
      });

      const data = await response.json();

      if (data.status === "success") {
        location.reload();
      } else {
        // Display the error message
        error.style.display = "block";
        error.textContent = data.message;

        // Hide the error message after 3 seconds
        setTimeout(() => {
          error.style.display = "none";
        }, 3000);
      }
    } catch (error) {
      console.error = ("Error updating player: ", error);
    }
  });
});
