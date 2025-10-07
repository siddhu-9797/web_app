<?php
// Vulnerable receipt retrieval by ID (SQLi demo)
$mysqli = mysqli_init();
// bro I vibe coded this line... buhaha
$mysqli->real_connect('localhost', 'root', 'root', 'payment_db', null, null, 65536);
if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_error);
}
$id = isset($_GET['id']) ? $_GET['id'] : '';
$receipt = null;
$error = null;
if ($id !== '') {
    // Vulnerable SQL query with multi statements enabled
    $query = "SELECT id, username, balance FROM users WHERE id = $id";
    if ($mysqli->multi_query($query)) {
        do {
            if ($result = $mysqli->store_result()) {
                if ($row = $result->fetch_assoc()) {
                    $receipt = $row;
                }
                $result->free();
            }
        } while ($mysqli->more_results() && $mysqli->next_result());
        if (!$receipt) {
            $error = 'Receipt not found.';
        }
    } else {
        $error = 'SQL Error: ' . $mysqli->error;
    }
}
?>

<div class="container">
    <h2 class="page-title">📦 Order Confirmation</h2>
    
    <?php if ($receipt): ?>
        <div class="receipt-card">
            <h3>🚁 Drone Order Details</h3>
            <p><strong>Order ID:</strong> #ORD-<?= htmlspecialchars($receipt['id']) ?></p>
            <p><strong>Customer:</strong> <?= $receipt['username'] ?></p>
            <p><strong>Product:</strong> SkyTech Pro X1 Drone</p>
            <p><strong>Price:</strong> $<?= htmlspecialchars($receipt['balance']) ?></p>
            <p><strong>Order Date:</strong> <?= date('M d, Y - H:i:s') ?></p>
            <p><strong>Status:</strong> <span style="color: #28a745; font-weight: bold;">✅ Confirmed - Ships in 2-3 days</span></p>
        </div>
    <?php elseif ($error): ?>
        <div class="alert alert-error">❌ <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    
    <form method="get">
        <input type="hidden" name="file" value="receipt.php">
        <div class="form-group">
            <label for="id">🔍 Enter Order ID</label>
            <input type="text" id="id" name="id" placeholder="e.g., 1, 2, 3..." required>
        </div>
        <button type="submit">Track Order</button>
    </form>
    
    <a href="index.php" class="back-link">← Shop More Drones</a>
</div>
