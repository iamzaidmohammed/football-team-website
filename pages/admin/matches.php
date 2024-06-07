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
                <div class="match">
                    <div class="match-date">
                        12th June, 2024
                    </div>
                    <div class="teams">
                        <div class="team">
                            <img src="../../assets/images/team01.png" alt="Home team logo" class="team_logo">
                            <p class="team_name right">Manchester City</p>
                        </div>
                        <span class="match-time">23:45 GMT</span>
                        <div class="team">
                            <img src="../../assets/images/team01.png" alt="Away team logo" class="team_logo">
                            <p class="team_name">Manchester City</p>
                        </div>
                    </div>
                    <div class="btns">
                        <span class="edit btn">Edit</span>
                        <span class="update btn">Update</span>
                        <span class="delete btn">Delete</span>
                    </div>
                </div>
            </div>
            <div class="results">
                <h2>Past Matches</h2>
                <div class="match">
                    <div class="match-date">
                        12th June, 2024
                    </div>
                    <div class="teams">
                        <div class="team r-home">
                            <img src="../../assets/images/team01.png" alt="Home team logo" class="team_logo r-home-logo">
                            <p class="team_name right r-home-name">Manchester City</p>
                        </div>
                        <div class="scores">
                            <span class="home-score score">3</span>
                            :
                            <span class="away-score score">2</span>
                        </div>
                        <div class="team r-away">
                            <img src="../../assets/images/team01.png" alt="Away team logo" class="team_logo r-away-logo">
                            <p class="team_name r-away-name">Manchester City</p>
                        </div>
                    </div>
                </div>

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
    </div>
</main>

<script src="./js/addMatch.js"></script>
</body>

</html>