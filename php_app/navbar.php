<?php
// Navigation component for SkyTech Drones
// This file contains the common header and navigation for all pages
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'SkyTech Drones'; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <a href="index.php" class="logo">🚁 SkyTech Drones</a>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="shop.php">Shop</a></li>
                <li><a href="upload.php">Upload Receipt</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">