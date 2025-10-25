<?php
$page_title = "SkyTech Drones - Upload Receipt";
// Vulnerable file upload handler
$upload_dir = 'uploads/';
$message = '';
$error = '';

// Create uploads directory if it doesn't exist
if (!is_dir($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['receipt'])) {
    $file = $_FILES['receipt'];
    
    // Vulnerable: Only basic validation, no proper file type checking
    if ($file['error'] === UPLOAD_ERR_OK) {
        $filename = $file['name'];
        $tmp_name = $file['tmp_name'];
        
        // Vulnerable: No file extension validation or content checking
        $target_path = $upload_dir . $filename;
        
        if (move_uploaded_file($tmp_name, $target_path)) {
            $message = "Receipt uploaded successfully! File saved as: " . htmlspecialchars($filename);
        } else {
            $error = "Failed to upload file.";
        }
    } else {
        $error = "Upload error: " . $file['error'];
    }
}

// List uploaded files
$uploaded_files = [];
if (is_dir($upload_dir)) {
    $files = scandir($upload_dir);
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            $uploaded_files[] = $file;
        }
    }
}

include 'navbar.php';
?>

<style>
.upload-section {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
    margin: 20px 0;
}

.upload-form {
    margin-top: 20px;
}

.file-list {
    list-style: none;
    padding: 0;
}

.file-list li {
    padding: 10px;
    background: #fff;
    margin: 5px 0;
    border-radius: 4px;
    border: 1px solid #ddd;
}

.file-list a {
    color: #2196F3;
    text-decoration: none;
    font-weight: bold;
}

.file-list a:hover {
    text-decoration: underline;
}

.alert {
    padding: 10px;
    margin: 10px 0;
    border-radius: 4px;
}

.alert-success {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.alert-error {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}
</style>

        <div class="container">
            <h2 class="page-title">📄 Upload Your Receipt</h2>
            
            <div class="upload-section">
                <p>Had issues with your order? Upload your receipt for verification and support.</p>
                
                <?php if ($message): ?>
                    <div class="alert alert-success">✅ <?= $message ?></div>
                <?php endif; ?>
                
                <?php if ($error): ?>
                    <div class="alert alert-error">❌ <?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
                
                <form method="post" enctype="multipart/form-data" class="upload-form">
                    <div class="form-group">
                        <label for="receipt">📎 Select Receipt File</label>
                        <input type="file" id="receipt" name="receipt" required>
                        <small>Accepted formats: PDF, JPG, PNG, TXT</small>
                    </div>
                    <button type="submit">Upload Receipt</button>
                </form>
            </div>
            
            <?php if (!empty($uploaded_files)): ?>
            <div class="uploaded-files">
                <h3>📂 Uploaded Receipts</h3>
                <ul class="file-list">
                    <?php foreach ($uploaded_files as $file): ?>
                        <li>
                            <a href="uploads/<?= htmlspecialchars($file) ?>" target="_blank">
                                📄 <?= htmlspecialchars($file) ?>
                            </a>
                            <small> - <?= date('M d, Y H:i', filemtime($upload_dir . $file)) ?></small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>
            
            <a href="index.php" class="back-link">← Back to Shop</a>
        </div>

<?php include 'footer.php'; ?>