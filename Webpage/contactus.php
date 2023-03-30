<!DOCTYPE html>
<html lang="en">

<head>
    <title>Venue Hive - Contact Us</title>
    <?php include "head.inc.php"; ?>

</head>

<body>
    <main>
        <!-- Navigation -->
        <?php include "navbar.php"; ?>
        <!-- Login Modal -->
        <?php include "login.php"; ?>


        <header class="masthead">
            <div class="container-fluid">
                <div class="row">
                    <div class="container">
                        <div class="row">
                            <div class="contact-us">
                                <section id="contact-info">
                                    <h1>Contact Us</h1>
                                    <p>Please fill out the form. We will get back to your inquiry as soon as possible.</p>
                                    <h2>VenueHive Contact Information</h2>
                                    <ul>
                                        <li>Email: <a href="mailto:support@venuehive.com">support@venuehive.com</a></li>
                                        <li>Phone: (65) 687 432</li>
                                    </ul>
                                </section>
                            </div>
                            <div class="contact-form">
                                <section id="contact-form-section" aria-label="Contact Form">
                                    <h2>Contact Form</h2>
                                    <form id="contact-form" method="post">
                                        <div class="form-group">
                                            <label class="form-label" for="username">Username:</label>
                                            <input class="form-control" type="text" id="username" name="username" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="email">Email:</label>
                                            <input class="form-control" type="email" id="email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="name">Name:</label>
                                            <input class="form-control" type="text" id="name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="subject">Subject:</label>
                                            <select class="form-control" id="subject" name="subject" required>
                                                <option value="">-- Select Subject --</option>
                                                <option value="General Inquiry">General Inquiry</option>
                                                <option value="Bug Report">Bug Report</option>
                                                <option value="Feature Request">Feature Request</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="message">Message:</label>
                                            <textarea class="form-control" id="message" name="message" required></textarea>
                                        </div>
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </form>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!--Footer-->
        <?php include "footer.php"; ?>
        <!-- Bootstrap core JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS -->
        <script src="js/scripts.js"></script>
    </main>

</body>

</html>