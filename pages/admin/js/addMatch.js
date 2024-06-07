const addMatchContainer = document.querySelector(".add-match-container");
const body = document.querySelector("body");
const addBtn = document.querySelector(".add-match");
const closeBtn = addMatchContainer.querySelector(".add-close");

addBtn.addEventListener("click", () => {
  addMatchContainer.style.display = "unset";
  body.style.overflow = "hidden";
});

closeBtn.addEventListener("click", () => {
  addMatchContainer.style.display = "none";
  body.style.overflow = "unset";
});

document.addEventListener("DOMContentLoaded", () => {
  const addMatchForm = document.querySelector("#add-match-form");
  const error = document.querySelector(".add-match-error-message");

  addMatchForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(addMatchForm);

    try {
      // Send a POST request to the PHP script
      const response = await fetch("php/addMatch.php", {
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
