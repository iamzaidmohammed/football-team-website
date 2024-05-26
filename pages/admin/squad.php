<?php include './includes/header.php'; ?>
<?php include './includes/sidebar.php'; ?>

<?php
$players = [['name' => 'Ruben Dias', 'age' => 23, 'category' => 'Defender', 'position' => 'CB', 'number' => 4, 'goals' => 2, 'assists' => 1], ['name' => 'Kyle Walker', 'age' => 23, 'category' => 'Defender', 'position' => 'CB', 'number' => 4, 'goals' => 2, 'assists' => 1]]
?>

<main id="squad">
    <div class="container">
        <div class="header">
            <div class="search-bar">
                <input type="text" name="search" id="search" placeholder="Search player">
                <i class="fa-solid fa-search"></i>
            </div>
            <a href="#" class="add-player">
                Add
                <i class="fa-solid fa-plus"></i>
            </a>
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
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
</body>

</html>