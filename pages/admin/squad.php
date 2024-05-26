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
                    <tr>
                        <td>Erling Haaland</td>
                        <td>24</td>
                        <td>Striker</td>
                        <td>CF</td>
                        <td>9</td>
                        <td>34</td>
                        <td>9</td>
                        <td class="btn edit"><a href="#">Edit</a></td>
                        <td class="delete btn">Delete</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
</body>

</html>