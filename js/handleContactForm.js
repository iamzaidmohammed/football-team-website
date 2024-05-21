document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("#contact-form");
  const sendBtn = form.querySelector("#submit");

  sendBtn.addEventListener("click", async (event) => {
    event.preventDefault(); // Prevent form from submitting the traditional way

    // Create a new FormData object from the form
    const formData = new FormData(form);

    try {
      // Send the form data to PHP using fetch
      const response = await fetch("../php/contact-form.php", {
        method: "POST",
        body: formData,
      });

      if (!response.ok) {
        throw new Error("Network response was not okay");
      }

      // Parse the JSON response from PHP
      const data = await response.json();

      if (data.status === "success") {
        console.log(data.message);
      } else {
        console.log(data.message);
      }
    } catch (error) {
      console.error("Error:", error);
    }
  });
});
