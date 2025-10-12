<?php
$page_title = "SkyTech Drones - Shop";
include 'navbar.php';
?>

        <div class="container">
            <h2 class="page-title">🛒 Complete Your Drone Purchase</h2>
            <form id="paymentForm" method="POST" action="shop.php">
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
                document.getElementById('receipt-link').innerHTML = `<div class='alert alert-success'>✅ Drone purchase successful! <a href='receipt.php?id=1' style='color: #155724; font-weight: bold;'>View Order Confirmation →</a></div>`;
            });
            </script>
            
            <a href="index.php" class="back-link">← Back to Home</a>
        </div>

<?php include 'footer.php'; ?>