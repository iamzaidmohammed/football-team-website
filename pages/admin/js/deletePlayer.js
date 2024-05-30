function initializeDeletePlayerFunctionality() {
  const confirmContainer = document.querySelector(".confirm-delete-player");
  const deleteBtn = document.querySelectorAll(".delete");
  const noBtn = document.querySelector(".no");

  // Add your event listeners for edit buttons here
  deleteBtn.forEach((button) => {
    button.addEventListener("click", () => {
      confirmContainer.style.display = "block";
    });
  });

  noBtn.addEventListener("click", (e) => {
    confirmContainer.style.display = "none";
  });
}

function identifyPlayer(player) {
  document.querySelector("#delete-player-id").value = player.id;
  document.querySelector(".player-delete-name").textContent = player.name;
}

document.addEventListener("DOMContentLoaded", () => {
  const confirmDelete = document.querySelector(".confirm");
  const yesBtn = document.querySelector(".yes");

  yesBtn.addEventListener("click", async (event) => {
    event.preventDefault();

    // Form data
    const formData = new FormData(confirmDelete);

    try {
      // Send a POST request to the PHP script
      const response = await fetch("php/deletePlayer.php", {
        method: "POST",
        body: formData,
      });

      // Parse the JSON response
      const data = await response.json();

      if (data.status === "success") {
        location.reload();
      }
    } catch (error) {
      console.error = ("Error updating player: ", error);
    }
  });
});
