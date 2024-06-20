document.addEventListener("DOMContentLoaded", async () => {
  const resultsContainer = document.querySelector(".results");

  try {
    // Send a GET request to the PHP script
    const response = await fetch("php/fetchPastMatches.php");

    // Parse the JSON response
    const matches = await response.json();

    if (typeof matches == "string") {
      const emptyMatchDiv = document.createElement("div");
      emptyMatchDiv.textContent = matches;
      resultsContainer.appendChild(emptyMatchDiv);
    } else {
      matches.forEach((match) => {
        // Create main match div
        const matchDiv = document.createElement("div");
        matchDiv.classList.add("match");

        // Create match date div
        const matchDateDiv = document.createElement("div");
        matchDateDiv.classList.add("match-date");
        matchDateDiv.textContent = match.date;
        matchDiv.appendChild(matchDateDiv);

        // Create teams div
        const teamsDiv = document.createElement("div");
        teamsDiv.classList.add("teams");

        // Create home team div
        const homeTeamDiv = document.createElement("div");
        homeTeamDiv.classList.add("team", "r-home");

        const homeTeamLogo = document.createElement("img");
        homeTeamLogo.src = "../../assets/images/teams/" + match.home_logo;
        homeTeamLogo.alt = "Home team logo";
        homeTeamLogo.classList.add("team_logo", "r-home-logo");
        homeTeamDiv.appendChild(homeTeamLogo);

        const homeTeamName = document.createElement("p");
        homeTeamName.classList.add("team_name", "right", "r-home-name");
        homeTeamName.textContent = match.home_team_name;
        homeTeamDiv.appendChild(homeTeamName);

        teamsDiv.appendChild(homeTeamDiv);

        // Create scores div
        const scoresDiv = document.createElement("div");
        scoresDiv.classList.add("scores");

        const homeScoreSpan = document.createElement("span");
        homeScoreSpan.classList.add("home-score", "score");
        homeScoreSpan.textContent = match.home_team_score;
        scoresDiv.appendChild(homeScoreSpan);

        const colonSpan = document.createElement("span");
        colonSpan.textContent = " : ";
        scoresDiv.appendChild(colonSpan);

        const awayScoreSpan = document.createElement("span");
        awayScoreSpan.classList.add("away-score", "score");
        awayScoreSpan.textContent = match.away_team_score;
        scoresDiv.appendChild(awayScoreSpan);

        teamsDiv.appendChild(scoresDiv);

        // Create away team div
        const awayTeamDiv = document.createElement("div");
        awayTeamDiv.classList.add("team", "r-away");

        const awayTeamLogo = document.createElement("img");
        awayTeamLogo.src = "../../assets/images/teams/" + match.away_logo;
        awayTeamLogo.alt = "Away team logo";
        awayTeamLogo.classList.add("team_logo", "r-away-logo");
        awayTeamDiv.appendChild(awayTeamLogo);

        const awayTeamName = document.createElement("p");
        awayTeamName.classList.add("team_name", "r-away-name");
        awayTeamName.textContent = match.away_team_name;
        awayTeamDiv.appendChild(awayTeamName);

        teamsDiv.appendChild(awayTeamDiv);

        // Append teams div to match div
        matchDiv.appendChild(teamsDiv);

        // Create the buttons div
        const btnsDiv = document.createElement("div");
        btnsDiv.classList.add("btns");

        const updateBtn = document.createElement("span");
        updateBtn.classList.add("update-result", "btn");
        updateBtn.textContent = "Update";
        updateBtn.addEventListener("click", () => changeScores(match));
        btnsDiv.appendChild(updateBtn);

        matchDiv.appendChild(btnsDiv);

        // Append match div to the document body or a specific parent element
        // Append the match div to the container
        resultsContainer.appendChild(matchDiv);
      });
    }

    initializeUpdatePastMatchFunctionality();
  } catch (error) {
    console.error("Error fetching Matches:", error);
  }
});
