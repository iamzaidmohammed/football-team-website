document.addEventListener("DOMContentLoaded", async () => {
  try {
    // Send a GET request to the PHP script
    const response = await fetch("php/fetchPlayers.php");

    // Parse the JSON response
    const players = await response.json();

    // Get the tbody element
    const tbody = document.querySelector("table tbody");

    // Clear any existing rows in the tbody
    tbody.innerHTML = "";

    players.forEach((player) => {
      // Create a row element for each player
      const row = document.createElement("tr");

      row.setAttribute("data-player-id", player.id); // each player 'id'

      // Create a cell for each player attribute and append to the row
      const nameCell = document.createElement("td");
      nameCell.textContent = player.name;
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
      row.appendChild(deleteCell);

      // Append the row to the tbody
      tbody.appendChild(row);
    });

    // Call the function to initialize edit functionality
    initializeEditPlayerFunctionality();
  } catch (error) {
    console.error("Error fetching players:", error);
  }
});
