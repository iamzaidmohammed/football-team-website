<?php include '../includes/header.php' ?>
<main id="contact">
    <h2 class="heading">How you can reach us</h2>

    <div class="contact-info">
        <h3>General Enquires</h3>
        <div class="info">
            <p class="phone">+233 43 534 5443</p>
            <p class="phone">info@team.com</p>
        </div>
    </div>

    <form action="#" method="POST" id="contact-form">
        <h3>Fill out this form!</h3>
        <div class="inputs">
            <div class="input-field">
                <label for="name">Name: </label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="input-field">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
        </div>
        <div class="text-field">
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
        </div>

        <input type="submit" name="submit" id="submit" value="Send message">
    </form>
</main>

<script src="../js/handleContactForm.js"></script>
<?php include '../includes/footer.php' ?>