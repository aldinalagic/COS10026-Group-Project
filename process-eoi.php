<?php
require_once 'settings.php';
session_start();
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    echo "❌ Connection failed: " . mysqli_connect_error();
}
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "❌ Invalid request.";
    exit();
}
$jobID = $_POST['jobID'];
$FirstName = trim($_POST['FirstName']);
$LastName = trim($_POST['LastName']);
$Street = trim($_POST['Street']);
$Suburb = trim($_POST['Suburb']);
$State = trim($_POST['State']);
$Postcode = trim($_POST['Postcode']);
$Email = trim($_POST['Email']);
$Phone = trim($_POST['Phone']);
$Skills = [];
$Skills[] = trim($_POST['Skill1']);
$Skills[] = trim($_POST['Skill2']);
$Skills[] = trim($_POST['Skill3']);
$OtherSkills = trim($_POST['OtherSkills']);

// Add the fields above to the database
$query = "INSERT INTO eoi (FirstName, LastName, Street, Suburb, State, Postcode, Email, Phone, Skill1, Skill2, Skill3, OtherSkills) VALUES ('$FirstName', '$LastName', '$Street', '$Suburb', '$State', '$Postcode', '$Email', '$Phone', '$Skills[0]', '$Skills[1]', '$Skills[2]', '$OtherSkills')";
$result = mysqli_query($conn, $query);
if ($result) {
    echo "✅ Application submitted successfully.";
} else {
    echo "❌ Error: " . mysqli_error($conn);
}
// Close the connection
mysqli_close($conn);