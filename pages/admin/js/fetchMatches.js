document.addEventListener("DOMContentLoaded", async () => {
  const fixturesContainer = document.querySelector(".fixtures");

  try {
    // Send a GET request to the PHP script
    const response = await fetch("php/fetchMatches.php");

    // Parse the JSON response
    const matches = await response.json();

    if (typeof matches == "string") {
      const emptyMatchDiv = document.createElement("div");
      emptyMatchDiv.textContent = matches;
      fixturesContainer.appendChild(emptyMatchDiv);
    } else {
      matches.forEach((match) => {
        // Create the main match div
        const matchDiv = document.createElement("div");
        matchDiv.classList.add("match");

        // Create the match date div
        const matchDateDiv = document.createElement("div");
        matchDateDiv.classList.add("match-date");
        matchDateDiv.textContent = match.date;
        matchDiv.appendChild(matchDateDiv);

        // Create the teams div
        const teamsDiv = document.createElement("div");
        teamsDiv.classList.add("teams");

        // Create the home team div
        const homeTeamDiv = document.createElement("div");
        homeTeamDiv.classList.add("team", "home");

        const homeTeamLogoImg = document.createElement("img");
        homeTeamLogoImg.src = "../../assets/images/teams/" + match.home_logo;
        homeTeamLogoImg.alt = "Home team logo";
        homeTeamLogoImg.classList.add("team_logo", "home-logo");
        homeTeamDiv.appendChild(homeTeamLogoImg);

        const homeTeamNameP = document.createElement("p");
        homeTeamNameP.classList.add("team_name", "home-name", "right");
        homeTeamNameP.textContent = match.home_team_name;
        homeTeamDiv.appendChild(homeTeamNameP);

        teamsDiv.appendChild(homeTeamDiv);

        // Create the match time span
        const matchTimeSpan = document.createElement("span");
        matchTimeSpan.classList.add("match-time");
        matchTimeSpan.textContent = "GMT " + match.time.slice(0, -3);
        teamsDiv.appendChild(matchTimeSpan);

        // Create the away team div
        const awayTeamDiv = document.createElement("div");
        awayTeamDiv.classList.add("team", "away");

        const awayTeamLogoImg = document.createElement("img");
        awayTeamLogoImg.src = "../../assets/images/teams/" + match.away_logo;
        awayTeamLogoImg.alt = "Away team logo";
        awayTeamLogoImg.classList.add("team_logo", "away-logo");
        awayTeamDiv.appendChild(awayTeamLogoImg);

        const awayTeamNameP = document.createElement("p");
        awayTeamNameP.classList.add("team_name", "away-name");
        awayTeamNameP.textContent = match.away_team_name;
        awayTeamDiv.appendChild(awayTeamNameP);

        teamsDiv.appendChild(awayTeamDiv);

        matchDiv.appendChild(teamsDiv);

        // Create the buttons div
        const btnsDiv = document.createElement("div");
        btnsDiv.classList.add("btns");

        const editBtn = document.createElement("span");
        editBtn.classList.add("edit", "btn");
        editBtn.textContent = "Edit";
        editBtn.addEventListener("click", () => populateEditForm(match));
        btnsDiv.appendChild(editBtn);

        const updateBtn = document.createElement("span");
        updateBtn.classList.add("update", "btn");
        updateBtn.textContent = "Update";
        updateBtn.addEventListener("click", () => updateMatchID(match));
        btnsDiv.appendChild(updateBtn);

        const deleteBtn = document.createElement("span");
        deleteBtn.classList.add("delete", "btn");
        deleteBtn.textContent = "Delete";
        deleteBtn.addEventListener("click", () => identifyMatch(match));
        btnsDiv.appendChild(deleteBtn);

        matchDiv.appendChild(btnsDiv);

        // Append the match div to the container
        fixturesContainer.appendChild(matchDiv);
      });
    }

    // Call the function to initialize edit functionality
    initializeEditMatchFunctionality();
    initializeUpdateMatchFunctionality();
    initializeDeleteMatchFunctionality();
  } catch (error) {
    console.error("Error fetching Matches:", error);
  }
});
