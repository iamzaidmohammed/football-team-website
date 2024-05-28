<?php include './includes/header.php'; ?>
<?php include './includes/sidebar.php'; ?>

<?php
$stmt = $db_connection->prepare("SELECT * FROM admin");
$stmt->execute();
$result = $stmt->get_result();
$admin = $result->fetch_assoc();
?>

<main id="settings">
    <div class="container">
        <h2>Settings</h2>

        <div class="main-content">
            <div class="username">
                <div>
                    <p>Username</p>
                    <span><?php echo $admin['username']
                            ?></span>
                </div>
                <div class="btn edit">Change</div>
            </div>
            <div class="password">
                <div>
                    <p>Username</p>
                    <span>********</span>
                </div>
                <div class="btn edit">Change</div>
            </div>
        </div>

        <div class="change change-username">
            <div class="overlay"></div>
            <form action="./php/changeUsername.php" method="POST" id="username-form">
                <header>
                    <p>Change username</p>
                    <i class="fa-solid fa-xmark"></i>
                </header>

                <div class="error-message" style="display: none;"></div>

                <div>
                    <input type="text" name="username" id="username" placeholder="Enter new username">

                    <input type="submit" name="edit-username" id="change-username" value="Change username">
                </div>
            </form>
        </div>

        <div class="change change-password">
            <div class="overlay"></div>
            <form action="./php/changePassword.php" method="POST" id="password-form">
                <header>
                    <p>Change password</p>
                    <i class="fa-solid fa-xmark"></i>
                </header>

                <div class="password-error-message" style="display: none;"></div>

                <div class="password-fields">
                    <input type="password" name="current-password" id="current-password" placeholder="Enter current password">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <div class="password-fields">
                    <input type="password" name="new-password" id="new-password" placeholder="Enter new password">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <div class="password-fields">
                    <input type="password" name="confirm-password" id="confirm-password" placeholder="Confirm password">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <input type="submit" name="change-password" id="change-password" value="Change password">
            </form>
        </div>
    </div>
</main>

<script src="js/changeBtn.js"></script>
<script src="js/changeUsername.js"></script>
<script src="js/changePassword.js"></script>

</body>

</html>