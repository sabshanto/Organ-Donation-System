<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['consent_file'])) {
    $consentChoice = $_POST['consent'];
    $exceptions = $_POST['exceptions'] ?? '';
    $specificOrgans = $_POST['specific_organs'] ?? '';

    $uploadDir = "../uploads/";
    $uploadPath = $uploadDir . basename($_FILES['consent_file']['name']);
    $successMessage = $errorMessage = '';

    if (move_uploaded_file($_FILES['consent_file']['tmp_name'], $uploadPath)) {
        $successMessage = "Consent form uploaded successfully!";
        $_SESSION['upload_success'] = $successMessage;
        $_SESSION['file_path'] = $uploadPath;
        $_SESSION['consent'] = $consentChoice;
        $_SESSION['exceptions'] = $exceptions;
        $_SESSION['specific_organs'] = $specificOrgans;
    } else {
        $errorMessage = "Error uploading the consent form.";
        $_SESSION['upload_error'] = $errorMessage;
    }

    header("Location: upload_status.php");
    exit;
}
