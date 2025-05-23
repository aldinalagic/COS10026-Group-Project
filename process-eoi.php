<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
$jobID = $_POST['jobreference'];
$FirstName = trim($_POST['first-name']);
$LastName = trim($_POST['last-name']);
$Street = trim($_POST['street-address']);
$Suburb = trim($_POST['suburb']);
$State = trim($_POST['state']);
$Postcode = trim($_POST['postcode']);
$Email = trim($_POST['email']);
$Phone = trim($_POST['phone-number']);
$Skills = $_POST['technical'];
$OtherSkills = trim($_POST['other-skills']);

// Add the fields above to the database
$query = "INSERT INTO eoi (JobReferenceNumber, FirstName, LastName, StreetAddress, SuburbTown, State, Postcode, EmailAddress, PhoneNumber, Skill1, Skill2, Skill3, OtherSkills, STATUS) VALUES ('$jobID', '$FirstName', '$LastName', '$Street', '$Suburb', '$State', '$Postcode', '$Email', '$Phone', '$Skills[0]', '$Skills[1]', '$Skills[2]', '$OtherSkills', 'Recently added')";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "✅ Application submitted successfully.";
} else {
    echo "❌ Error: " . mysqli_error($conn);
}
// Close the connection
mysqli_close($conn);