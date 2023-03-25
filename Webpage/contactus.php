<!DOCTYPE html>
<html>

<head>
    <title>Venue Hive - COntact Us</title>
    <?php include "head.inc.php"; ?>
</head>

<body id="page-top">
    <!-- Navigation -->
    <?php include "navbar.php"; ?>

    <!-- Login Modal -->
    <?php include "login.php"; ?>

    <header>
        <h1>Contact Us</h1>
        <p>Please fill out the form below to contact us</p>
    </header>
    <section id="contact-info">
        <h2>Contact Information</h2>
        <ul>
            <li>Email: <a href="mailto:contact@example.com">contact@example.com</a></li>
            <li>Phone: 555-555-5555</li>
            <li>Address: 123 Main St, Anytown, USA</li>
        </ul>
    </section>
    <section id="contact-form">
        <h2>Contact Form</h2>
        <form id="contact-form" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </section>
    <!-- Footer -->
    <?php include "footer.php"; ?>
    <!-- Bootstrap core JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS -->
    <script src="js/scripts.js"></script>
</body>

</html>