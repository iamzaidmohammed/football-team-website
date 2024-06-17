function initializeUpdateMatchFunctionality() {
  const updateContainer = document.querySelector(".update-fixture-container");
  const updateBtn = document.querySelectorAll(".update");
  const closeBtn = document.querySelector(".update-close");

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

function updateMatchID(match) {
  document.querySelector("#update-match-id").value = match.id;
}

document.addEventListener("DOMContentLoaded", () => {
  const updateMatchForm = document.querySelector("#update-fixture-form");
  const error = document.querySelector(".update-fixture-error-message");

  updateMatchForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(updateMatchForm);

    try {
      // Send a POST request to the PHP script
      const response = await fetch("php/updateFixture.php", {
        method: "POST",
        body: formData,
      });

      const data = await response.json();

      if (data.status == "success") {
        // location.reload();
        console.log(data.message);
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
