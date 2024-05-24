<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <nav>
        <div class="logo-container">
            <img src="./assets/images/team01.png" alt="Team Logo" class="logo" />
        </div>
        <i class="fa-solid fa-bars"></i>
        <i class="fa-solid fa-xmark"></i>
        <div class="menu">
            <ul class="links">
                <li class="link"><a href="#" class="active">Home</a></li>
                <li class="link"><a href="./pages/about.php">About</a></li>
                <li class="link"><a href="./pages/team.php">Team</a></li>
                <li class="link"><a href="./pages/matches/fixtures.php">Matches</a></li>
                <li class="link"><a href="./pages/contact.php">Contact Us</a></li>
            </ul>
        </div>
    </nav>

    <main id="home">

        <section class="banner">
            <img src="./assets/images/banner.jpg" alt="Banner image">
            <div class="banner-overlay">
                <p>A 2:1 victory away from home</p>
            </div>
            <i class="fa-solid fa-angle-left"></i>
            <i class="fa-solid fa-angle-right"></i>
        </section>

        <section class="matches">
            <h2>Upcoming Match</h2>
            <div class="upcoming-match">
                <div class="match-date">
                    12th June, 2024
                </div>
                <div class="teams">
                    <div class="team">
                        <p class="team_name right">Manchester City</p>
                        <img src="./assets/images/team01.png" alt="Home team logo" class="team_logo">
                    </div>
                    <span class="match-time">23:45 GMT</span>
                    <div class="team">
                        <img src="./assets/images/team01.png" alt="Away team logo" class="team_logo">
                        <p class="team_name">Manchester City</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="gallery">
            <h2>Gallery</h2>
            <div class="images">
                <img src="./assets/images/banner.jpg" alt="img">
                <img src="./assets/images/banner.jpg" alt="img">
                <img src="./assets/images/banner.jpg" alt="img">
            </div>
            <a href="#" class="see-more">See more</a>
        </section>

    </main>

    <footer>
        <div class="left">
            <div class="logo-container">
                <img src="./assets/images/team01.png" alt="Team Logo" class="footer-logo" />
            </div>
        </div>
        <div class="right">
            <div class="social">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-youtube"></i>
                <i class="fa-brands fa-x-twitter"></i>
            </div>

            <ul class="footer-links">
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
    </footer>

    <div class="copyright">
        &copy; 2024 | All rights reserved
    </div>

    <script src="./js/toggleMenu.js"></script>
</body>

</html>