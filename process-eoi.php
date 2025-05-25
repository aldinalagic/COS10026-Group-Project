<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'settings.php';
session_start();

// redirects if not post
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: apply.html");
    exit();
}

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


// sanitizing covers trim, striplashes, and htmlspecialchars. 
$jobID    = isset($_POST['jobreference'])    ? sanitize_input($_POST['jobreference'])    : '';
$FirstName= isset($_POST['first-name'])      ? sanitize_input($_POST['first-name'])      : '';
$LastName = isset($_POST['last-name'])       ? sanitize_input($_POST['last-name'])       : '';
$DOB      = isset($_POST['dob'])             ? sanitize_input($_POST['dob'])             : '';
$gender   = isset($_POST['gender'])          ? sanitize_input($_POST['gender'])          : '';
$street   = isset($_POST['street-address'])  ? sanitize_input($_POST['street-address'])  : '';
$suburb   = isset($_POST['suburb'])          ? sanitize_input($_POST['suburb'])          : '';
$state    = isset($_POST['state'])           ? strtoupper(sanitize_input($_POST['state'])): '';
$postcode = isset($_POST['postcode'])        ? sanitize_input($_POST['postcode'])        : '';
$email    = isset($_POST['email'])           ? sanitize_input($_POST['email'])           : '';
$phone    = isset($_POST['phone-number'])    ? sanitize_input($_POST['phone-number'])    : '';
$skills   = isset($_POST['technical'])       ? array_map('sanitize_input', $_POST['technical']) : [];
$otherSkills = isset($_POST['other-skills']) ? sanitize_input($_POST['other-skills'])    : '';

//validating the user input and showing errors (if)
$errors = [];
if (empty($jobID)) {
    $errors[] = "A job reference number is required.";
}
if (!preg_match("/^[a-zA-Z]{1,20}$/", $FirstName)) {
    $errors[] = "First name must be 1 to 20 letters only (no numbers, spaces, or special characters).";
} 
if (!preg_match("/^[a-zA-Z]{1,20}$/", $LastName)) {
    $errors[] = "Last name must be 1 to 20 letters only (no numbers, spaces, or special characters).";
} 
if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $DOB)) {
    $parts = explode('/', $DOB);
    $DOB = $parts[2] . '-' . $parts[1] . '-' . $parts[0];
}
$date_obj = DateTime::createFromFormat('Y-m-d', $DOB);

$dob_errors = DateTime::getLastErrors();
if (!$date_obj || $dob_errors['warning_count'] > 0 || $dob_errors['error_count'] > 0) {
    $errors[] = "DOB must be a valid date in yyyy/mm/dd format.";
}

$validGenders = ['Male', 'Female', 'Other'];
if (!in_array($gender, $validGenders)) {
    $errors[] = "Invalid gender selected.";
}

if (strlen($street) > 40) {
    $errors[]  = "Street address must be 40 characters or less.";
}
if (strlen($suburb) > 40) {
    $errors[] = "Suburb/Town must be 40 characters or less.";
}
if (!in_array($state, ['VIC','NSW','QLD','NT','WA','SA','TAS','ACT'])) {
    $errors[] = "Invalid state";
}

$statePostcodeMap = [
    'VIC' => '/^3\d{3}$/',
    'NSW' => '/^2\d{3}$/',
    'QLD' => '/^4\d{3}$/',
    'NT' => '/^0\d{3}$/',
    'WA' => '/^6\d{3}$/',
    'SA' => '/^5\d{3}$/',
    'TAS' => '/^7\d{3}$/',
    'ACT' => '/^0\d{3}$/',
];
if (!preg_match("/^\d{4}$/", $postcode)) {
    $errors[] = "Postcode must be 4 digits";
} elseif (!preg_match($statePostcodeMap[$state], $postcode)) {
    $errors[] = "Postcode does not match the selected state.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}
if (!preg_match("/^[\d\s\-]{8,15}$/", $phone)) {
    $errors[] = "Phone must be 8-15 characters, digits, spaces, or dashes";
}
if (empty($skills)) {
    $errors[] = "At least one skill must be selected";
}

//shows errors after validating 
if (count($errors) > 0) {
    echo "<h2>There were errors with your submission:</h2><ul>";
    foreach ($errors as $error) {
        echo "<li>" . htmlspecialchars($error) . "</li>";
    }
    echo "</ul><a href='html/apply.html'>Go back to the form.</a>";
    exit();
}

//dob format -> sql
$DOB_sql = $date_obj->format('Y-m-d');

//connect to db 
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    error_log("DB Connection failed: " . mysqli_connect_error());
    die("❌ Sorry, we're experiencing technical issues. Please try again later." );
}

$createTableQuery = "
CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    JobReferenceNumber VARCHAR(50) NOT NULL,
    FirstName VARCHAR(20) NOT NULL,
    LastName VARCHAR(20) NOT NULL,
    DOB DATE,
    Gender VARCHAR(10),
    StreetAddress VARCHAR(40),
    SuburbTown VARCHAR(40),
    State VARCHAR(3),
    Postcode VARCHAR(4),
    EmailAddress VARCHAR(100),
    PhoneNumber VARCHAR(20),
    Skill1 VARCHAR(100),
    Skill2 VARCHAR(100),
    Skill3 VARCHAR(100),
    OtherSkills TEXT,
    STATUS VARCHAR(20)
)";

if (!mysqli_query($conn,$createTableQuery)) {
    die("❌ Failed to create table: " . mysqli_error($conn));
}

//skills string 
$skill1 = isset($skills[0]) ? $skills[0] : "";
$skill2 = isset($skills[1]) ? $skills[1] : "";
$skill3 = isset($skills[2]) ? $skills[2] : "";

//statement
$stmt = $conn->prepare("INSERT INTO eoi
        (JobReferenceNumber, FirstName, LastName, DOB, Gender, StreetAddress, SuburbTown, State, Postcode, EmailAddress, PhoneNumber, Skill1, Skill2, Skill3, OtherSkills, STATUS)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Recently Added')");
if ($stmt === false) {
        die("Prepare failed: " . htmlspecialchars($conn->error));
}

//bind paramters
$stmt->bind_param(
        "sssssssssssssss",
        $jobID, $FirstName, $LastName, $DOB_sql, $gender, $street, $suburb, $state, $postcode, $email, $phone, $skill1, $skill2, $skill3, $otherSkills
);

//executing 
if ($stmt->execute()) {
        $eoi_id = $conn->insert_id; //autogenerates eoi number 
        echo "<h3>✅ Application submitted successfully.</h3>";
        echo "<p>Your Expression of Interest has been recorded.</p>";
        echo "<p>Your unique EOI number is <strong>" . htmlspecialchars($eoi_id) . "</strong>.</p>";
        echo "<p><a href='html/apply.html'>Submit another EOI</a></p>";
    } else { 
        echo "❌ Database error: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
    $conn->close();
?>


