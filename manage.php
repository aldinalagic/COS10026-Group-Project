<?php
require_once 'button.php';
require_once 'input.php';
require_once 'settings.php';
session_start();
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $eoiNumber = trim($_GET['eoi']);
    // Fetch the application details from the eoi table
    $application = [];
    $result = mysqli_query($conn, "SELECT * FROM eoi WHERE EOInumber = '$eoiNumber'");
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $application = [
                'firstname' => $row['FirstName'],
                'lastname' => $row['LastName'],
                'street' => $row['StreetAddress'],
                'suburb' => $row['SuburbTown'],
                'state' => $row['State'],
                'postcode' => $row['Postcode'],
                'email' => $row['EmailAddress'],
                'phone' => $row['PhoneNumber'],
                'JobReferenceNumber' => $row['JobReferenceNumber'],
                'technical' => [
                    'skill1' => $row['Skill1'],
                    'skill2' => $row['Skill2'],
                    'skill3' => $row['Skill3'],
                ],
                'OtherSkills' => $row['OtherSkills'],
                'status' => $row['STATUS'],
            ];
        } else {
            echo "No application found with EOInumber: " . htmlspecialchars($eoiNumber);
        }
    } else {
        echo "Error fetching application: " . mysqli_error($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        echo '<title>' . htmlspecialchars($application['firstname']) . ' ' . htmlspecialchars($application['lastname']) . "'s application" . '</title>';
    ?>
    <link rel="stylesheet" href="/styles/style.css">
</head>
<body id="manage-body">
    <?php
    echo "<form>",
    '<h4>Personal Information</h4>',
    '<div id="personal-info-manage" class="manage-section">',
    createInput('text', 'first-name', 0, InputSize::Normal, $application['firstname'], '', false, true, 'First Name'),
    createInput('text', 'last-name', 0, InputSize::Normal, $application['lastname'], '', false, true, 'Last Name'),
    createInput('text', 'street-address', 0, InputSize::Normal, $application['street'], '', false, true, 'Street Address'),
    createInput('text', 'suburb', 0, InputSize::Normal, $application['suburb'], '', false, true, 'Suburb/Town'),
    createInput('text', 'state', 0, InputSize::Normal, $application['state'], '', false, true, 'State'),
    createInput('text', 'postcode', 0, InputSize::Normal, $application['postcode'], '', false, true, 'Postcode'),
    '</div>',
    '<h4>Contact Information</h4>',
    '<div id="contact-info-manage" class="manage-section">',
    createInput('email', 'email', 0, InputSize::Normal, $application['email'], '', false, true, 'Email Address'),
    createInput('tel', 'phone-number', 0, InputSize::Normal, $application['phone'], '', false, true, 'Phone Number'),
    '</div>',
    '<h4>Role Information</h4>',
    '<div id="role-info-manage" class="manage-section">',
    createInput('text', 'job-reference-number', 0, InputSize::Normal, $application['JobReferenceNumber'], '', false, true, 'Job Reference Number'),
    createInput('text', 'technical', 0, InputSize::Normal, $application['technical']['skill1'], '', false, true, 'Technical Skill 1'),
    createInput('text', 'technical', 1, InputSize::Normal, $application['technical']['skill2'], '', false, true, 'Technical Skill 2'),
    createInput('text', 'technical', 2, InputSize::Normal, $application['technical']['skill3'], '', false, true, 'Technical Skill 3'),
    createInput('text', 'other-skills', 0, InputSize::Normal, $application['OtherSkills'], '', false, true, 'Other Skills'),
    '</div>',
    '<input type="hidden" name="eoi" value="' . htmlspecialchars($eoiNumber) . '">',
    '<div id="manage-control">',
    createButton('submit', 'Cycle Left', ButtonSize::Normal, ButtonVariant::Primary, 'appleft.php'),
    createButton('submit', 'Update Application', ButtonSize::Normal, ButtonVariant::Primary, 'update-application.php'),
    createButton('submit', 'Cycle Right', ButtonSize::Normal, ButtonVariant::Danger, 'appright.php'),
    '</div>',
    '</form>';
?>
</body>
</html>