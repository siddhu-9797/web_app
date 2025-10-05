<?php
// Vulnerable PHP payment app for SQLi demo
$mysqli = new mysqli('localhost', 'root', 'root', 'payment_db');
if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $amount = $_POST['amount'];
    // Vulnerable SQL query
    $query = "SELECT balance FROM users WHERE id = $user_id";
    $result = $mysqli->query($query);
    if ($result && $row = $result->fetch_assoc()) {
        $balance = $row['balance'];
        header("Location: index.html?balance=" . urlencode($balance));
        exit;
    } else {
        header("Location: index.html?error=" . urlencode('User not found'));
        exit;
    }
}
// If GET, just show the HTML (handled by index.html)
include 'index.html';
?>
