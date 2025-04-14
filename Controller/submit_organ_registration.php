<?php
require_once('../Models/db.php'); // your DB connection file

function sanitize($data)
{
    return htmlspecialchars(strip_tags(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = sanitize($_POST['name']);
    $blood_group = sanitize($_POST['blood_group']);
    $gender = sanitize($_POST['gender']);
    $dob = sanitize($_POST['dob']);
    $address = sanitize($_POST['address']);
    $donor_type = sanitize($_POST['donor_type']);

    // Basic validation
    if (empty($name) || empty($blood_group) || empty($gender) || empty($dob) || empty($address) || empty($donor_type)) {
        echo "All fields are required!";
        exit;
    }

    // Validate name (only letters and spaces)
    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        echo "Invalid name format!";
        exit;
    }

    // Validate blood group
    $valid_blood_groups = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
    if (!in_array(strtoupper($blood_group), $valid_blood_groups)) {
        echo "Invalid blood group!";
        exit;
    }

    // Save to DB
    $con = dbConnection();
    $sql = "INSERT INTO organ_registrations (name, blood_group, gender, dob, address, donor_type)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($con, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ssssss", $name, $blood_group, $gender, $dob, $address, $donor_type);
        if (mysqli_stmt_execute($stmt)) {
            echo "Organ registration submitted successfully!";
        } else {
            echo "Failed to submit registration. Please try again.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Something went wrong with the query.";
    }

    mysqli_close($con);
} else {
    echo "Invalid request method.";
}
