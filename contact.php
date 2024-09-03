<?php
// Include the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\bookmystay\vendor\phpmailer\phpmailer\src\Exception.php';
require 'c:\xampp\htdocs\bookmystay\Vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\bookmystay\Vendor\phpmailer\phpmailer\src\SMTP.php';

// Database connection details
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "book my stay";

// Create a connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Insert the form data into the database
    $insertQuery = "INSERT INTO contact_form (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        // Database insertion successful

        // Send an email notification
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'maureennankonde@gmail.com'; // Your Gmail username
            $mail->Password = ''; // Your Gmail password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            // Sender and recipient
            $mail->setFrom('maureennankonde@gmail.com', 'Maureen Nankonde');
            $mail->addAddress('maureennankonde@gmail.com', 'Maureen Nankonde');

            // Email subject and content
            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Submission';
            $mail->Body = "Name: $name<br>Email: $email<br>Subject: $subject<br>Message: $message";

            $mail->send();

            // Provide feedback to the user (e.g., success)
            echo "Your message has been sent. Thank you for contacting us!";
        } catch (Exception $e) {
            // Email could not be sent
            echo 'Message could not be sent. Mailer Error: ' . $e->getMessage();
        }
    } else {
        // Database insertion failed
        echo "Message could not be sent. Please try again.";
    }
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>


    <!-- Font Import -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Anton&family=Cookie&family=Poppins:wght@600&display=swap">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- FontAwesome Integration -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="./admin/css/roombook.css">

    <style>
        /* Root Variables */
        :root {
            --bg-text-shadow: 0 2px 4px rgb(13 0 77 / 8%), 0 3px 6px rgb(13 0 77 / 8%), 0 8px 16px rgb(13 0 77 / 8%);
            --bg-box-shadow: 0px 0px 5px 2px rgba(0, 0, 0, 0.621);
            --scrollbar-width: .4rem;
            --scrollbar-track: rgb(6, 6, 44);
            --scrollbar-thumb: #0040ff;
        }

        /* Scrollbar Styles */
        *::-webkit-scrollbar {
            width: var(--scrollbar-width);
        }

        *::-webkit-scrollbar-track {
            background: var(--scrollbar-track);
        }

        *::-webkit-scrollbar-thumb {
            background: var(--scrollbar-thumb);
        }

        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            /* text-shadow: var(--bg-text-shadow); */
        }

        /* Navigation Styles */
        nav {
            /* ... (your existing styles) */
        }

        /* ... (continue with the rest of your styles) */
    </style>
</head>
<body>
 <!-- ======= Contact Section ======= -->
 <section id="contact" class="contact bg-secondary text-white p-3" >
            <div class="container" data-aos="fade-up">

                <div class="section-header text-white">
                    <h2>Contact Us</h2>
                    <p>write to us</p>
                </div>

                <div class="row gx-lg-0 gy-4">

                    <div class="col-lg-4">

                        <div class="info-container d-flex flex-column align-items-center justify-content-center">
                            <div class="info-item d-flex">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                                <div>
                                    <h4>Location:</h4>
                                    <p>Evelyhon college, lusaka, zambia</p>
                                </div>
                            </div>
                            <!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-envelope flex-shrink-0"></i>
                                <div>
                                    <h4>Email:</h4>
                                    <p>maureennankonde@gmail.com</p>
                                </div>
                            </div>
                            <!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-phone flex-shrink-0"></i>
                                <div>
                                    <h4>Call:</h4>
                                    <p>+260 779002328</p>
                                </div>
                            </div>
                            <!-- End Info Item -->

                            <div class="info-item d-flex">
                                <i class="bi bi-clock flex-shrink-0"></i>
                                <div>
                                    <h4>Open Hours:</h4>
                                    <p>Mon-Sun: 9AM - 23PM</p>
                                </div>
                            </div>
                            <!-- End Info Item -->
                        </div>

                    </div>

                    <div class="col-lg-8 mb-5">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="7" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                    <!-- End Contact Form -->

                </div>

            </div>
        </section>
        <!-- End Contact Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer bg-dark text-white">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-info ">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span  class="text-white">Book My Stay </span>
                    </a>
                    <p>one stop hotel </p>
                    <div class="social-links d-flex mt-4 text-white">
                        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href=""  class="text-white">Home</a></li>
                        <li><a href=""  class="text-white">About us</a></li>
                        <li><a href=""  class="text-white">Services</a></li>
                        <li><a href="#"  class="text-white">Terms of service</a></li>
                        <li><a href="#"  class="text-white">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#"  class="text-white">Web Design</a></li>
                        <li><a href="#"  class="text-white">Web Development</a></li>
                        <li><a href="#"  class="text-white">Product Management</a></li>
                        <li><a href="#"  class="text-white">Marketing</a></li>
                        <li><a href="#"  class="text-white">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Contact Us</h4>
                    <p>
                        lusaka <br> evelyn hon college<br> Zambia <br><br>
                        <strong>Phone:</strong> +260 779002328<br>
                        <strong>Email:</strong> maureennankonde@gmail.com<br>
                    </p>

                </div>

            </div>
        </div>
</body>
</html>