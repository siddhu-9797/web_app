<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkyTech Drones - Shop</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    // File inclusion handler - potentially vulnerable to LFI
    if (isset($_GET['file'])) {
        $file = $_GET['file'];
        // Basic file inclusion without proper validation
        if (file_exists($file)) {
            include($file);
            exit;
        } else {
            echo "<div class='alert alert-error'>File not found: " . htmlspecialchars($file) . "</div>";
        }
    }
    ?>
    
    <header class="header">
        <nav class="nav">
            <a href="index.php" class="logo">� SkyTech Drones</a>
            <ul class="nav-links">
                <li><a href="index.php?file=home.php">Home</a></li>
                <li><a href="index.php?file=about.php">About</a></li>
                <li><a href="index.php">Shop</a></li>
                <li><a href="index.php?file=upload.php">Upload Receipt</a></li>
                <li><a href="index.php?file=contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main class="main">
        <div class="container">
            <h2 class="page-title">🛒 Complete Your Drone Purchase</h2>
            <form id="paymentForm" method="POST" action="index.php">
                <div class="form-group">
                    <label for="card_number">💳 Card Number</label>
                    <input type="text" id="card_number" name="card_number" value="4111 1111 1111 1111" required>
                </div>
                
                <div class="form-group">
                    <label for="expiry">📅 Expiry Date</label>
                    <input type="text" id="expiry" name="expiry" value="12/34" required>
                </div>
                
                <div class="form-group">
                    <label for="cvv">🔒 CVV</label>
                    <input type="text" id="cvv" name="cvv" value="123" required>
                </div>
                
                <div class="form-group">
                    <label for="name">👤 Name on Card</label>
                    <input type="text" id="name" name="name" value="John Doe" required>
                </div>
                
                <button type="submit">🛸 Complete Drone Purchase - $1,299</button>
            </form>
            
            <div id="receipt-link"></div>
            
            <script>
            document.getElementById('paymentForm').addEventListener('submit', function(e) {
                e.preventDefault();
                // Always show receipt link for demo (simulate receipt ID = 1)
                document.getElementById('receipt-link').innerHTML = `<div class='alert alert-success'>✅ Drone purchase successful! <a href='index.php?file=receipt.php&id=1' style='color: #155724; font-weight: bold;'>View Order Confirmation →</a></div>`;
            });
            </script>
            
            <a href="index.php?file=home.php" class="back-link">← Back to Home</a>
        </div>
    </main>
</body>
</html>