const searchIcon = document.querySelector(".fa-search");
const searchField = document.querySelector("#search");
const searchBar = document.querySelector(".search-bar");
const closeSearch = document.querySelector(".close-search");

// Define a media query
const mediaQuery = window.matchMedia("(max-width: 490px)");

searchIcon.addEventListener("click", () => {
  if (mediaQuery.matches) {
    searchIcon.classList.add("hide");
    searchBar.classList.add("search");
    searchField.classList.add("show");
    closeSearch.classList.add("show");
    searchField.focus();
  }
});

closeSearch.addEventListener("click", () => {
  searchIcon.classList.remove("hide");
  searchBar.classList.remove("search");
  searchField.classList.remove("show");
  closeSearch.classList.remove("show");

  searchField.value = "";
  userInput = "";
  displayAllPlayers();
});

let userInput = "";
let players = [];

// Function to debounce keyup event
function debounce(func, delay) {
  let debounceTimer;
  return function () {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => func.apply(this, arguments), delay);
  };
}

// Function to clear the table
function clearTable() {
  const tbody = document.querySelector("table tbody");
  tbody.innerHTML = "";
}

// Function to create a row for a player
function createPlayerRow(player) {
  const tbody = document.querySelector("table tbody");

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

// Function to fetch players data
async function fetchPlayers() {
  const response = await fetch("php/fetchPlayers.php");
  players = await response.json();
  displayAllPlayers(); // Display all players initially
}

// Function to display all players
function displayAllPlayers() {
  clearTable();
  for (const player of players) {
    createPlayerRow(player);
  }
}

searchField.addEventListener(
  "keyup",
  debounce(async (e) => {
    const ignoreKeys = [
      "Tab",
      "Alt",
      "Control",
      "Shift",
      "Meta",
      "Escape",
      "CapsLock",
      "Enter",
    ];

    if (e.key.length === 1) {
      userInput += e.key;
    } else if (e.key === "Backspace") {
      userInput = userInput.slice(0, -1);
    }

    if (!ignoreKeys.includes(e.key)) {
      clearTable();

      for (const player of players) {
        if (player.name.toLowerCase().startsWith(userInput.toLowerCase())) {
          createPlayerRow(player);
        }
      }
    }
  }, 100)
);

// Fetch players data on page load
document.addEventListener("DOMContentLoaded", fetchPlayers);
