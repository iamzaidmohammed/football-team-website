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
                    <input type="text" name="search" id="search" placeholder="Search match">
                    <i class="fa-solid fa-search"></i>
                </div>
                <a href="#" class="add-match btn">
                    Add
                    <i class="fa-solid fa-plus"></i>
                </a>
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
                        <a href="#" class="edit btn">Edit</a>
                        <span class="delete btn">Delete</span>
                    </div>
                </div>
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
                        <a href="#" class="edit btn">Edit</a>
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
                        <div class="team">
                            <img src="../../assets/images/team01.png" alt="Home team logo" class="team_logo">
                            <p class="team_name right">Manchester City</p>
                        </div>
                        <div class="scores">
                            <span class="home-score score">3</span>
                            :
                            <span class="away-score score">2</span>
                        </div>
                        <div class="team">
                            <img src="../../assets/images/team01.png" alt="Away team logo" class="team_logo">
                            <p class="team_name">Manchester City</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
</body>

</html>