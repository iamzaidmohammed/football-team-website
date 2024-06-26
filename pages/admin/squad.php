<?php include './includes/header.php'; ?>
<?php include './includes/sidebar.php'; ?>

<main id="squad">
    <div class="container">
        <div class="header">
            <div class="left">
                <h2>Squad</h2>
            </div>
            <div class="right">
                <div class="search-bar">
                    <input type="text" name="search" id="search" placeholder="Search player">
                    <i class="fa-solid fa-search"></i>
                    <i class="fa-solid fa-xmark close-search"></i>
                </div>
                <span class="add-player btn">
                    Add
                    <i class="fa-solid fa-plus"></i>
                </span>
            </div>
        </div>

        <div class="main-content">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Category</th>
                        <th>Position</th>
                        <th>Number</th>
                        <th>Goals</th>
                        <th>Assists</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

        <!-- Add player form -->
        <div class="add-player-container" style="display: none;">
            <div class="overlay"></div>
            <form action="./php/addPlayer.php" method="POST" id="add-player-form">
                <header>
                    <p>Add Player</p>
                    <i class="fa-solid fa-xmark add-close"></i>
                </header>

                <div class="add-player-error-message" style="display: none;"></div>

                <div class="add-inputs">
                    <div class=" add-fields player-name">
                        <label for="add-player-name">Name</label>
                        <input type="text" name="add-player-name" id="add-player-name">
                    </div>

                    <div class="add-fields player-age">
                        <label for="add-player-age">Age</label>
                        <input type="number" name="add-player-age" id="add-player-age">
                    </div>

                    <div class="add-fields player-category">
                        <label for="add-player-category">Category</label>
                        <select name="add-player-category" id="add-player-category">
                            <option value="empty">--- Select player category ---</option>
                            <option value="Goalkeeper">Goalkeeper</option>
                            <option value="Defender">Defender</option>
                            <option value="Midfielder">Midfielder</option>
                            <option value="Striker">Striker</option>
                        </select>
                    </div>

                    <div class="add-fields player-position">
                        <label for="add-player-position">Position</label>
                        <select name="add-player-position" id="add-player-position">
                            <option value="empty">--- Select player position ---</option>
                            <option value="GK">GK</option>
                            <option value="RB">RB</option>
                            <option value="CB">CB</option>
                            <option value="LB">LB</option>
                            <option value="CDM">CDM</option>
                            <option value="CM">CM</option>
                            <option value="LM">LM</option>
                            <option value="RM">RM</option>
                            <option value="CAM">CAM</option>
                            <option value="CF">CF</option>
                            <option value="ST">ST</option>
                        </select>
                    </div>

                    <div class="add-fields player-number">
                        <label for="add-player-number">Number</label>
                        <input type="number" name="add-player-number" id="add-player-number">
                    </div>

                    <div class="add-fields player-goals">
                        <label for="add-player-goals">Goals</label>
                        <input type="number" name="add-player-goals" id="add-player-goals">
                    </div>

                    <div class="add-fields player-assists">
                        <label for="add-player-assists">Assists</label>
                        <input type="number" name="add-player-assists" id="add-player-assists">
                    </div>
                </div>

                <input type="submit" name="add-player" id="add-player" value="Add Player">
            </form>
        </div>

        <!-- Edit player form -->
        <div class="edit-player-container" style="display: none;">
            <div class="overlay"></div>
            <form action="./php/editPlayer.php" method="POST" id="edit-player-form">
                <header>
                    <p>Edit Player</p>
                    <i class="fa-solid fa-xmark edit-close"></i>
                </header>

                <div class="edit-player-error-message" style="display: none;"></div>

                <input type="hidden" name="player-id" id="player-id" value="">

                <div class="edit-inputs">
                    <div class=" edit-fields player-name">
                        <label for="player-name">Name</label>
                        <input type="text" name="player-name" id="player-name">
                    </div>

                    <div class="edit-fields player-age">
                        <label for="player-age">Age</label>
                        <input type="number" name="player-age" id="player-age">
                    </div>

                    <div class="edit-fields player-category">
                        <label for="player-category">Category</label>
                        <select name="player-category" id="player-category">
                            <option value="empty">--- Select player category ---</option>
                            <option value="Goalkeeper">Goalkeeper</option>
                            <option value="Defender">Defender</option>
                            <option value="Midfielder">Midfielder</option>
                            <option value="Striker">Striker</option>
                        </select>
                    </div>

                    <div class="edit-fields player-position">
                        <label for="player-position">Position</label>
                        <select name="player-position" id="player-position">
                            <option value="empty">--- Select player position ---</option>
                            <option value="GK">GK</option>
                            <option value="RB">RB</option>
                            <option value="CB">CB</option>
                            <option value="LB">LB</option>
                            <option value="CDM">CDM</option>
                            <option value="CM">CM</option>
                            <option value="LM">LM</option>
                            <option value="RM">RM</option>
                            <option value="CAM">CAM</option>
                            <option value="CF">CF</option>
                            <option value="ST">ST</option>
                        </select>
                    </div>

                    <div class="edit-fields player-number">
                        <label for="player-number">Number</label>
                        <input type="number" name="player-number" id="player-number">
                    </div>

                    <div class="edit-fields player-goals">
                        <label for="player-goals">Goals</label>
                        <input type="number" name="player-goals" id="player-goals">
                    </div>

                    <div class="edit-fields player-assists">
                        <label for="player-assists">Assists</label>
                        <input type="number" name="player-assists" id="player-assists">
                    </div>
                </div>

                <input type="submit" name="edit-player" id="edit-player" value="Edit Player">
            </form>
        </div>

        <!-- Confirm delete player container -->
        <div class="confirm-delete-player" style="display: none;">
            <div class="overlay"></div>
            <div class="confirm-delete">
                <header>
                    <h2>Are you sure you want to delete <span class="player-delete-name"></span>?</h2>
                </header>
                <form action="./php/deletePlayer.php" method="POST" class="confirm">
                    <input type="hidden" name="delete-player-id" id="delete-player-id">
                    <button name="yes" class="yes">Yes</button>
                    <span class="no">No</span>
                </form>
            </div>
        </div>
    </div>
</main>

<script src="./js/addPlayer.js"></script>
<script src="./js/editPlayer.js"></script>
<script src="./js/deletePlayer.js"></script>
<script src="./js/searchPlayer.js"></script>
<script src="./js/fetchPlayers.js"></script>
</body>

</html>