const searchIcon = document.querySelector(".fa-search");
const searchField = document.querySelector("#search-player");
const searchBar = document.querySelector(".search-bar");
const closeSearch = document.querySelector(".close-search");

searchIcon.addEventListener("click", () => {
  searchIcon.classList.add("hide");
  searchBar.classList.add("search");
  searchField.classList.add("show");
  closeSearch.classList.add("show");
  searchField.focus();
});

closeSearch.addEventListener("click", () => {
  searchIcon.classList.remove("hide");
  searchBar.classList.remove("search");
  searchField.classList.remove("show");
  closeSearch.classList.remove("show");

  searchField.value = "";

  fetchAndDisplayPlayers();
});

let userInput = "";

searchField.addEventListener("keydown", async (e) => {
  // Send a GET request to the PHP script
  const response = await fetch("php/fetchPlayers.php");

  // Parse the JSON response
  const players = await response.json();

  // Get the tbody element
  const tbody = document.querySelector("table tbody");
  const table = document.querySelector("table");

  // Clear any existing rows in the tbody
  tbody.innerHTML = "";

  // List of keys to ignore
  const ignoreKeys = [
    "Tab",
    "Alt",
    "Control",
    "Shift",
    "Meta",
    "ArrowUp",
    "ArrowDown",
    "ArrowLeft",
    "ArrowRight",
    "Escape",
    "CapsLock",
    "Enter",
  ];

  // Update userInput based on the key pressed
  if (e.key.length === 1) {
    // Checks if the key pressed is a single character
    userInput += e.key;
  } else if (e.key === "Backspace") {
    userInput = userInput.slice(0, -1);
  }

  for (const player of players) {
    if (player.name.toLowerCase().startsWith(userInput.toLowerCase())) {
      // Create a row element for each player
      const row = document.createElement("tr");

      row.setAttribute("data-player-id", player.id); // each player 'id'

      // Create a cell for each player attribute and append to the row
      const nameCell = document.createElement("td");
      nameCell.textContent = player.name;
      nameCell.className = "name-cell";
      row.appendChild(nameCell);

      const ageCell = document.createElement("td");
      ageCell.textContent = player.age;
      row.appendChild(ageCell);

      const categoryCell = document.createElement("td");
      categoryCell.textContent = player.category;
      row.appendChild(categoryCell);

      const positionCell = document.createElement("td");
      positionCell.textContent = player.position;
      row.appendChild(positionCell);

      const numberCell = document.createElement("td");
      numberCell.textContent = player.number;
      row.appendChild(numberCell);

      const goalsCell = document.createElement("td");
      goalsCell.textContent = player.goals;
      row.appendChild(goalsCell);

      const assistsCell = document.createElement("td");
      assistsCell.textContent = player.assists;
      row.appendChild(assistsCell);

      // Create the Edit button cell
      const editCell = document.createElement("td");
      editCell.className = "btn edit";
      editCell.textContent = "Edit";
      editCell.addEventListener("click", () => populateEditForm(player)); // Add click event listener

      row.appendChild(editCell);

      // Create the Delete button cell
      const deleteCell = document.createElement("td");
      deleteCell.className = "delete btn";
      deleteCell.textContent = "Delete";
      deleteCell.addEventListener("click", () => identifyPlayer(player)); // Add click event listener
      row.appendChild(deleteCell);

      // Append the row to the tbody
      tbody.appendChild(row);
    }
  }
});
//   console.log(userInput);
