<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css">
</head>

<body id="login-body">
    <section class="login-content">
        <div class="vector">
            <img src="./assests/undraw_login_re_4vu2.svg" alt="login svg">
        </div>
        <div class="login-form">
            <h2>Welcome admin</h2>
            <form action="./php/adminLogin.php" method="POST">
                <div class="error-message">sdfds</div>
                <div class="fields">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="username" id="username" placeholder="Username">
                </div>

                <div class="fields">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>

                <input type="submit" name="login" id="login">
            </form>
        </div>

    </section>

    <script src="./js/login.js"></script>
</body>

</html>