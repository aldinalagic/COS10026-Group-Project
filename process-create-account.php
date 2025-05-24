<?php
session_start();
require_once 'settings.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "❌ Invalid request.";
    exit();
}


$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "❌ Connection failed: " . mysqli_connect_error();
}
$email = trim($_POST['email']);
$pass = trim($_POST['password']);
$firstName = trim($_POST['firstname']);
$lastName = trim($_POST['lastname']);
if (empty($email) || empty($pass) || empty($firstName) || empty($lastName)) {
    echo "❌ Please fill in all fields.";
    exit();
}
// Check if email already exists
$checkEmailQuery = "SELECT * FROM managers WHERE Email='$email'";
$checkEmailResult = mysqli_query($conn, $checkEmailQuery);
if (mysqli_num_rows($checkEmailResult) > 0) {
    echo "❌ Email already exists. Please use a different email.";
    exit();
}
// Insert new manager into the database
$insertQuery = "INSERT INTO managers (Email, Password, FirstName, LastName) VALUES ('$email', '$pass', '$firstName', '$lastName')";
if (mysqli_query($conn, $insertQuery)) {
    $_SESSION['email'] = $email;
    header("Location: home.php");
    exit();
} else {
    echo "❌ Error creating account: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
