function initializeEditPlayerFunctionality() {
  const formContainer = document.querySelector(".edit-player-container");
  const editBtn = document.querySelectorAll(".edit");
  const closeBtn = document.querySelector(".edit-close");

  // Add your event listeners for edit buttons here
  editBtn.forEach((button) => {
    button.addEventListener("click", () => {
      formContainer.style.display = "block";
    });
  });

  closeBtn.addEventListener("click", () => {
    formContainer.style.display = "none";
  });
}

function populateEditForm(player) {
  document.querySelector("#player-id").value = player.id;
  document.querySelector("#player-name").value = player.name;
  document.querySelector("#player-age").value = player.age;
  document.querySelector("#player-category").value = player.category;
  document.querySelector("#player-position").value = player.position;
  document.querySelector("#player-number").value = player.number;
  document.querySelector("#player-goals").value = player.goals;
  document.querySelector("#player-assists").value = player.assists;
}

document.addEventListener("DOMContentLoaded", () => {
  const editPlayerForm = document.querySelector("#edit-player-form");
  const error = document.querySelector(".edit-player-error-message");

  editPlayerForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(editPlayerForm);

    try {
      // Send a POST request to the PHP script
      const response = await fetch("php/editPlayer.php", {
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

  initializeEditPlayerFunctionality;
});
