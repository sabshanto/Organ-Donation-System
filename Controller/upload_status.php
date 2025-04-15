<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Upload Status</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@latest/dist/full.css" rel="stylesheet" />
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">

    <!-- Toast Container -->
    <div class="toast toast-top toast-end z-50">
        <?php if (isset($_SESSION['upload_success'])): ?>
            <div class="alert alert-success">
                <span>✅ <?php echo $_SESSION['upload_success']; ?></span>
            </div>
        <?php elseif (isset($_SESSION['upload_error'])): ?>
            <div class="alert alert-error">
                <span>❌ <?php echo $_SESSION['upload_error']; ?></span>
            </div>
        <?php endif; ?>
    </div>

    <!-- Optional Details Section -->
    <div class="bg-white p-6 rounded shadow-md max-w-md w-full mt-20">
        <?php if (isset($_SESSION['upload_success'])): ?>
            <p class="mb-2"><strong>Consent:</strong> <?php echo $_SESSION['consent']; ?></p>
            <?php if (!empty($_SESSION['exceptions'])): ?>
                <p><strong>Exceptions:</strong> <?php echo $_SESSION['exceptions']; ?></p>
            <?php endif; ?>
            <?php if (!empty($_SESSION['specific_organs'])): ?>
                <p><strong>Specific Organs:</strong> <?php echo $_SESSION['specific_organs']; ?></p>
            <?php endif; ?>
            <p><a href="<?php echo $_SESSION['file_path']; ?>" target="_blank" class="text-blue-500 underline">View Uploaded File</a></p>
        <?php endif; ?>
    </div>

    <script>
        // Optional auto-close for toast
        setTimeout(() => {
            document.querySelector('.toast')?.remove();
        }, 5000);
    </script>
</body>

</html>

<?php
session_unset();
session_destroy();
?>