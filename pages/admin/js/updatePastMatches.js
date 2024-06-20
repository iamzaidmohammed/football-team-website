function initializeUpdatePastMatchFunctionality() {
  const updateContainer = document.querySelector(".update-results-container");
  const updateBtn = document.querySelectorAll(".update-result");
  const closeBtn = document.querySelector(".update-results-close");

  // Add your event listeners for update buttons here
  updateBtn.forEach((btn) => {
    btn.addEventListener("click", () => {
      updateContainer.style.display = "block";
    });
  });

  // Add your event listeners for close button here
  closeBtn.addEventListener("click", () => {
    updateContainer.style.display = "none";
  });
}

function changeScores(match) {
  document.querySelector("#update-results-match-id").value = match.id;
  document.querySelector("#update-results-home-team-score").value =
    match.home_team_score;
  document.querySelector("#update-results-away-team-score").value =
    match.away_team_score;
}

document.addEventListener("DOMContentLoaded", () => {
  const updateResultsForm = document.querySelector("#update-results-form");
  const error = document.querySelector(".update-results-error-message");

  updateResultsForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(updateResultsForm);

    try {
      // Send a POST request to the PHP script
      const response = await fetch("php/updatePastMatches.php", {
        method: "POST",
        body: formData,
      });

      const data = await response.json();

      if (data.status == "success") {
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
      console.error = ("Error updating match: ", error);
    }
  });
});
