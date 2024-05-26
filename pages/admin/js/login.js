document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");
  const loginBtn = form.querySelector("#login");
  const error = document.querySelector(".error-message");

  loginBtn.addEventListener("click", async (event) => {
    event.preventDefault(); // Prevent form from submitting the traditional way

    // Create a new FormData object from the form
    const formData = new FormData(form);

    try {
      // Send the form data to PHP using fetch
      const response = await fetch("php/adminLogin.php", {
        method: "POST",
        body: formData,
      });

      // Parse the JSON response from PHP
      const data = await response.json();

      if (data.status === "success") {
        location.href = "dashboard.php";
      } else {
        // Display the error message
        error.style.display = "block";
        error.textContent = data.message;

        // Hide the error message after 3 seconds
        setTimeout(() => {
          error.style.display = "none";
        }, 2000);
      }
    } catch (error) {
      console.error("Error:", error);
    }
  });
});
