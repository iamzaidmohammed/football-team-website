<?php include './includes/header.php'; ?>
<?php include './includes/sidebar.php'; ?>

<main id="matches">
    <div class="container">
        <div class="header">
            <div class="left">
                <h2>Matches</h2>
            </div>
            <div class="right">
                <div class="search-bar">
                    <input type="text" name="search-match" id="search-match" placeholder="Search match">
                    <i class="fa-solid fa-search"></i>
                </div>
                <span class="add-match btn">
                    Add
                    <i class="fa-solid fa-plus"></i>
                </span>
            </div>
        </div>

        <div class="main-content">
            <div class="fixtures">
                <h2>Upcoming Matches</h2>
            </div>
            <div class="results">
                <h2>Past Matches</h2>
            </div>
        </div>

        <!-- Add match form -->
        <div class="add-match-container" style="display: none;">
            <div class="overlay"></div>
            <form action="./php/addMatch.php" method="POST" id="add-match-form" enctype="multipart/form-data">
                <header>
                    <p>Add Match</p>
                    <i class="fa-solid fa-xmark add-close"></i>
                </header>

                <div class="add-match-error-message" style="display: none;"></div>

                <div class="add-inputs">
                    <div class="add-fields home-team-name">
                        <label for="home-team-name">Home Team Name</label>
                        <input type="text" name="home-team-name" id="home-team-name">
                    </div>

                    <div class="add-fields away-team-name">
                        <label for="away-team-name">Away Team Name</label>
                        <input type="text" name="away-team-name" id="away-team-name">
                    </div>

                    <div class="add-fields home-team-logo">
                        <label for="home-team-logo">Home Team Logo</label>
                        <input type="file" name="home-team-logo" id="home-team-logo">
                    </div>

                    <div class="add-fields away-team-logo">
                        <label for="away-team-logo">Away Team Logo</label>
                        <input type="file" name="away-team-logo" id="away-team-logo">
                    </div>

                    <div class="add-fields add-match-date">
                        <label for="match-date">Match Date</label>
                        <input type="date" name="match-date" id="match-date">
                    </div>

                    <div class="add-fields add-match-time">
                        <label for="match-time">Match Time</label>
                        <input type="time" name="match-time" id="match-time">
                    </div>
                </div>

                <input type="submit" name="add-match" id="add-match" value="Add Match">
            </form>
        </div>

        <!-- Edit Match Form -->
        <div class="edit-fixture-container" style="display: none;">
            <div class="overlay"></div>
            <form action="./php/editFixture.php" method="POST" id="edit-fixture-form" enctype="multipart/form-data">
                <header>
                    <p>Edit Match</p>
                    <i class="fa-solid fa-xmark edit-close"></i>
                </header>

                <div class="edit-fixture-error-message" style="display: none;"></div>

                <input type="hidden" name="edit-match-id" id="edit-match-id">

                <div class="add-inputs">
                    <div class="add-fields home-team-name">
                        <label for="edit-home-team-name">Home Team Name</label>
                        <input type="text" name="edit-home-team-name" id="edit-home-team-name">
                    </div>

                    <div class="add-fields away-team-name">
                        <label for="edit-away-team-name">Away Team Name</label>
                        <input type="text" name="edit-away-team-name" id="edit-away-team-name">
                    </div>

                    <div class="add-fields home-team-logo">
                        <label for="edit-home-team-logo">Home Team Logo</label>
                        <img id="current-home-team-logo" src="" alt="Home Team Logo" width="50" height="50">
                        <input type="file" name="edit-home-team-logo" id="edit-home-team-logo">
                    </div>

                    <div class="add-fields away-team-logo">
                        <label for="edit-away-team-logo">Away Team Logo</label>
                        <img id="current-away-team-logo" src="" alt="Away Team Logo" width="50" height="50">
                        <input type="file" name="edit-away-team-logo" id="edit-away-team-logo">
                    </div>

                    <div class="add-fields add-match-date">
                        <label for="edit-match-date">Match Date</label>
                        <input type="date" name="edit-match-date" id="edit-match-date">
                    </div>

                    <div class="add-fields add-match-time">
                        <label for="edit-match-time">Match Time</label>
                        <input type="time" name="edit-match-time" id="edit-match-time">
                    </div>
                </div>

                <input type="submit" name="edit-match" id="edit-match" value="Edit Match">
            </form>
        </div>

        <!-- Update Match Form -->
        <div class="update-fixture-container" style="display: none;">
            <div class="overlay"></div>
            <form action="./php/updateFixture.php" method="POST" id="update-fixture-form">
                <header>
                    <p>Update Match</p>
                    <i class="fa-solid fa-xmark update-close"></i>
                </header>

                <div class="update-fixture-error-message" style="display: none;"></div>

                <input type="hidden" name="update-match-id" id="update-match-id">

                <div class="add-inputs">
                    <div class="add-fields home-team-score">
                        <label for="update-home-team-score">Home Team Score</label>
                        <input type="number" name="update-home-team-score" id="update-home-team-score">
                    </div>

                    <div class="add-fields away-team-score">
                        <label for="update-away-team-score">Away Team Score</label>
                        <input type="number" name="update-away-team-score" id="update-away-team-score">
                    </div>
                </div>

                <input type="submit" name="update-match" id="update-match" value="Update Match">
            </form>
        </div>

        <!-- Update Past Match Form -->
        <div class="update-results-container" style="display: none;">
            <div class="overlay"></div>
            <form action="./php/updatePastMatches.php" method="POST" id="update-results-form">
                <header>
                    <p>Change Scores</p>
                    <i class="fa-solid fa-xmark update-results-close"></i>
                </header>

                <div class="update-results-error-message" style="display: none;"></div>

                <input type="hidden" name="update-results-match-id" id="update-results-match-id">

                <div class="add-inputs">
                    <div class="add-fields home-team-score">
                        <label for="update-results-home-team-score">Home Team Score</label>
                        <input type="number" name="update-results-home-team-score" id="update-results-home-team-score">
                    </div>

                    <div class="add-fields away-team-score">
                        <label for="update-results-away-team-score">Away Team Score</label>
                        <input type="number" name="update-results-away-team-score" id="update-results-away-team-score">
                    </div>
                </div>

                <input type="submit" name="update-results" id="update-results" value="Update Match">
            </form>
        </div>

        <!-- Confirm delete matches container -->
        <div class="confirm-delete-matches" style="display: none;">
            <div class="overlay"></div>
            <div class="confirm-delete">
                <header>
                    <h2>Are you sure you want to delete the match between <span class="matches-delete-name"></span></h2>
                </header>
                <form action="./php/deleteFixture.php" method="POST" class="confirm">
                    <input type="hidden" name="delete-match-id" id="delete-match-id">
                    <button name="yes" class="yes">Yes</button>
                    <span class="no">No</span>
                </form>
            </div>
        </div>

    </div>
</main>

<script src="./js/addMatch.js"></script>
<script src="./js/editFixture.js"></script>
<script src="./js/updateFixture.js"></script>
<script src="./js/deleteFixture.js"></script>
<script src="./js/updatePastMatches.js"></script>
<script src="./js/fetchPastMatches.js"></script>
<script src="./js/fetchMatches.js"></script>
</body>

</html>