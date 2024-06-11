function initializeEditMatchFunctionality() {
  const formContainer = document.querySelector(".edit-fixture-container");
  const editBtn = document.querySelectorAll(".edit");
  const closeBtn = document.querySelector(".edit-close");

  // Add your event listeners for edit buttons here
  editBtn.forEach((button) => {
    button.addEventListener("click", () => {
      formContainer.style.display = "block";
      console.log(document.querySelector("#edit-match-id").value);
    });
  });

  closeBtn.addEventListener("click", () => {
    formContainer.style.display = "none";
  });
}

function populateEditForm(match) {
  document.querySelector("#edit-match-id").value = match.id;
  document.querySelector("#edit-home-team-name").value = match.home_team_name;
  document.querySelector("#edit-away-team-name").value = match.away_team_name;

  // Display current logos
  document.querySelector("#current-home-team-logo").src =
    "../../assets/images/teams/" + match.home_logo;
  document.querySelector("#current-away-team-logo").src =
    "../../assets/images/teams/" + match.away_logo;

  document.querySelector("#edit-match-date").value = match.date;
  document.querySelector("#edit-match-time").value = match.time;
}

function previewImage(input, imgElementSelector) {
  const file = input.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function (e) {
      document.querySelector(imgElementSelector).src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
}

document.addEventListener("DOMContentLoaded", () => {
  const homeTeamLogoInput = document.querySelector("#edit-home-team-logo");
  const awayTeamLogoInput = document.querySelector("#edit-away-team-logo");

  homeTeamLogoInput.addEventListener("change", function () {
    previewImage(this, "#current-home-team-logo");
  });

  awayTeamLogoInput.addEventListener("change", function () {
    previewImage(this, "#current-away-team-logo");
  });

  const editFixturesForm = document.querySelector("#edit-fixture-form");
  const error = document.querySelector(".edit-fixture-error-message");

  editFixturesForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    const formData = new FormData(editFixturesForm);

    try {
      // Send a POST request to the PHP script
      const response = await fetch("php/editFixture.php", {
        method: "POST",
        body: formData,
      });

      const data = await response.json();

      if (data.status === "success") {
        // console.log("worked");
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

// document.addEventListener("DOMContentLoaded", () => {
//   const editPlayerForm = document.querySelector("#edit-player-form");
//   const error = document.querySelector(".edit-player-error-message");

//   editPlayerForm.addEventListener("submit", async (event) => {
//     event.preventDefault();

//     const formData = new FormData(editPlayerForm);

//     try {
//       // Send a POST request to the PHP script
//       const response = await fetch("php/editPlayer.php", {
//         method: "POST",
//         body: formData,
//       });

//       const data = await response.json();

//       if (data.status === "success") {
//         location.reload();
//       } else {
//         // Display the error message
//         error.style.display = "block";
//         error.textContent = data.message;

//         // Hide the error message after 3 seconds
//         setTimeout(() => {
//           error.style.display = "none";
//         }, 3000);
//       }
//     } catch (error) {
//       console.error = ("Error updating player: ", error);
//     }
//   });

//   initializeEditPlayerFunctionality;
// });
