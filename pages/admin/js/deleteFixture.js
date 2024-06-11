function initializeDeleteMatchFunctionality() {
  const confirmContainer = document.querySelector(".confirm-delete-matches");
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

function identifyMatch(match) {
  document.querySelector("#delete-match-id").value = match.id;
  document.querySelector(".matches-delete-name").textContent =
    '"' + match.home_team_name + " and " + match.away_team_name + '?"';
}

document.addEventListener("DOMContentLoaded", () => {
  const confirmDelete = document.querySelector(".confirm");

  confirmDelete.addEventListener("submit", async (event) => {
    event.preventDefault();

    // Form data
    const formData = new FormData(confirmDelete);

    try {
      // Send a POST request to the PHP script
      const response = await fetch("php/deleteFixture.php", {
        method: "POST",
        body: formData,
      });

      // Parse the JSON response
      const data = await response.json();

      if (data.status === "success") {
        location.reload();
      }
    } catch (error) {
      console.error = ("Error deleting match: ", error);
    }
  });
});
