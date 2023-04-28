<?php
// Start session
session_start();
include('includes/dbconnection.php');
// Get user input from form
$email = $_POST['Email'];
$password = $_POST['Password'];

// Query database to retrieve user information
$stmt = mysqli_prepare($con, "SELECT * FROM users WHERE Email=?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    // User found, check password
    $row = mysqli_fetch_assoc($result);
    $hashed_password = $row['Password'];
    if (hash('sha256', $row['salt'] . $password) === $hashed_password) {
        // Passwords match, set session variables and redirect to home page
        $_SESSION['uid'] = $row['ID'];
        $_SESSION['Fname'] = $row['Fname'];
        header("Location: welcome.php");
        exit();
    } else {
        // Passwords do not match
        echo "Invalid password";
    }
} else {
    // User not found
    echo "User not found";
}

mysqli_close($con);
?>
