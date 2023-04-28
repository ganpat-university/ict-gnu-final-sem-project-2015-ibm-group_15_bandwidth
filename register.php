<?php
include('includes/dbconnection.php');
// Get user input from form
$username = $_POST['Fname'];
$Lname = $_POST['Lname'];
$email = $_POST['Email'];
$password = $_POST['Password'];

if ($password != $confirm_password) {
    $errors['ConfirmPassword'] = 'Passwords do not match';
  }
// Check if email already exists in database
$sql = "SELECT * FROM users WHERE Email=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    // Email already exists
    echo "Email address already in use";
} else {
    // Generate a random salt
    $salt = bin2hex(random_bytes(32));

    // Hash the password with the salt using SHA-256
    $hashed_password = hash('sha256', $salt . $password);

    // Insert user information into database
    $sql = "INSERT INTO users (Fname, LName, Email, Password, salt) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "sssss", $username, $Lname, $email, $hashed_password, $salt);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: index.php');
    } else {
        echo "Something Went Wrong!!";
    }
}

mysqli_close($con);
?>
