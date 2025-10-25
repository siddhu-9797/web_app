<?php
$page_title = "SkyTech Drones - Contact Us";
include 'navbar.php';
?>

        <div class="container">
            <h2 class="page-title">Contact Us</h2>
            
            <form id="contactForm" method="POST" action="contact.php">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" style="width: 100%; padding: 12px 15px; border: 2px solid #e1e5e9; border-radius: 8px; font-family: inherit; font-size: 1rem; resize: vertical;" required></textarea>
                </div>
                
                <button type="submit">Send Message</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = htmlspecialchars($_POST['name'] ?? '');
                $email = htmlspecialchars($_POST['email'] ?? '');
                $subject = htmlspecialchars($_POST['subject'] ?? '');
                $message = htmlspecialchars($_POST['message'] ?? '');
                
                if ($name && $email && $subject && $message) {
                    echo '<div class="alert alert-success">Thank you for your message, ' . $name . '! Our drone experts will get back to you soon.</div>';
                } else {
                    echo '<div class="alert alert-error">Please fill in all fields.</div>';
                }
            }
            ?>

            <div class="receipt-card" style="margin-top: 2rem;">
                <h3>Get in Touch with Our Drone Experts</h3>
                <p><strong>Email:</strong> sales@skytechdrones.com</p>
                <p><strong>Phone:</strong> +1 (555) FLY-TECH</p>
                <p><strong>Address:</strong> 456 Aviation Way, Tech Valley, CA 94085</p>
                <p><strong>Hours:</strong> Monday - Saturday, 8 AM - 8 PM PST</p>
            </div>

            <a href="index.php" class="back-link">← Back to Home</a>
        </div>

<?php include 'footer.php'; ?>