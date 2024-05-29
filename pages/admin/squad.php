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
                </div>
                <a href="#" class="add-player btn">
                    Add
                    <i class="fa-solid fa-plus"></i>
                </a>
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
    </div>
</main>

<script src="./js/fetchPlayers.js"></script>
</body>

</html>