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
if (empty($email) || empty($pass)) {
    echo "❌ Please fill in all fields.";
    exit();
}

$query = "SELECT * FROM managers WHERE Email='$email' AND Password='$pass'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($user) {
    $_SESSION['email'] = $user['Email'];
    header("Location: home.php");
    exit();
} else {
    echo "❌ Invalid email or password.";
}
?>