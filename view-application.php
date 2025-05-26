<?php
require_once 'button.php';
require_once 'avatar.php';
require_once 'popup.php';
require_once 'input.php';
require_once 'settings.php';

session_start();
if (!isset($_SESSION['email'])) {
    header('Location: 403-forbidden.php');
    exit();
}

$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle delete POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_eoi'])) {
    $deleteEoi = intval($_POST['delete_eoi']);
    $deleteQuery = "DELETE FROM eoi WHERE EOInumber = $deleteEoi";
    mysqli_query($conn, $deleteQuery);
    // Redirect to manage page after deletion
    header("Location: manage.php?deleted=1");
    exit();
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
    }
} else {
    echo "Error fetching application: " . mysqli_error($conn);
}

$email = $_SESSION['email'];
$avatarNameResult = mysqli_query($conn, "SELECT FirstName, LastName FROM managers WHERE Email='$email'");
$row = mysqli_fetch_assoc($avatarNameResult);
$FirstName = $row ? $row['FirstName'] : '';
$LastName = $row ? $row['LastName'] : '';

$eoiNumbers = [];
$resultAll = mysqli_query($conn, "SELECT EOInumber FROM eoi ORDER BY EOInumber ASC");
while ($rowAll = mysqli_fetch_assoc($resultAll)) {
    $eoiNumbers[] = $rowAll['EOInumber'];
}
$currentIndex = array_search($eoiNumber, $eoiNumbers);

// Find previous and next EOInumber
$prevEoi = $currentIndex > 0 ? $eoiNumbers[$currentIndex - 1] : null;
$nextEoi = $currentIndex < count($eoiNumbers) - 1 ? $eoiNumbers[$currentIndex + 1] : null;
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
    <div class="manage-topbar-wrapper">
        <div class="topbar-left">
            <?php echo createButton(ButtonSize::Normal, ButtonVariant::Shaded, ButtonColor::Grey, './styles/images/left_line.svg', 'Go back', 'button', 'manage.php') ?>
        </div>
    
        
        <div class="topbar-right">
            <?php
                echo createAvatar(AvatarSize::Normal, "$FirstName $LastName", true)
            ?>            
        </div>
    </div>
        
    <div class="topbar-center">
        <?php echo createAvatar(AvatarSize::Large, $application['firstname'] . ' ' . $application['lastname'], false) ?>
        <div>
            <?php echo createButton(ButtonSize::Normal, ButtonVariant::Danger, ButtonColor::Blue, '', 'Delete', 'button', '#deleteApplication') ?>
        </div>
    </div>
    
    <?php 
        $deleteButton = createButton(ButtonSize::Normal, ButtonVariant::Danger, ButtonColor::Grey, '', 'Delete', 'submit');
        echo createPopup(
            'deleteApplication',
            '🔥 Delete Application?',
            'Are you sure you want to delete ' . $application['firstname'] . ' ' . $application['lastname'] . '\'s application? 
            <br>We cant bring it back to life if you decide to delete it!',
            "<form method='post' action='view-application.php?eoi=" . htmlspecialchars($eoiNumber) . "'>
                <input type='hidden' name='delete_eoi' value='" . htmlspecialchars($eoiNumber) . "'>
                $deleteButton
            </form>"
        );
    ?>

    <?php

    $sparklesIcon = createIcon('./styles/images/sparkles_2_fill.svg', IconSize::Large);
    $signatureIcon = createIcon('./styles/images/signature_fill.svg', IconSize::Large);
    $suitcaseIcon = createIcon('./styles/images/suitcase_fill.svg', IconSize::Large);

    echo "<form id='manage-form'>",
        '<div class="manage-section-header">' . $sparklesIcon . '<h5>Personal Information</h5>' . '</div>',
        '<div id="personal-info-manage" class="manage-section">',
            createInput('text', 'first-name', 0, InputSize::Normal, $application['firstname'], '', false, true, 'First Name'),
            createInput('text', 'last-name', 0, InputSize::Normal, $application['lastname'], '', false, true, 'Last Name'),
            createInput('text', 'street-address', 0, InputSize::Normal, $application['street'], '', false, true, 'Street Address'),
            createInput('text', 'suburb', 0, InputSize::Normal, $application['suburb'], '', false, true, 'Suburb/Town'),
            createInput('text', 'state', 0, InputSize::Normal, $application['state'], '', false, true, 'State'),
            createInput('text', 'postcode', 0, InputSize::Normal, $application['postcode'], '', false, true, 'Postcode'),
        '</div>',

        '<div class="manage-section-header">' . $signatureIcon . '<h5>Contact Information</h5>' . '</div>',
        '<div id="contact-info-manage" class="manage-section">',
            createInput('email', 'email', 0, InputSize::Normal, $application['email'], '', false, true, 'Email Address'),
            createInput('tel', 'phone-number', 0, InputSize::Normal, $application['phone'], '', false, true, 'Phone Number'),
        '</div>',

        '<div id="suitcase" class="manage-section-header">' . $suitcaseIcon . '<h5>Role Information</h5>' . '</div>',
        '<div id="role-info-manage" class="manage-section">',
            createInput('text', 'job-reference-number', 0, InputSize::Normal, $application['JobReferenceNumber'], '', false, true, 'Job Reference Number'),
            createInput('text', 'technical', 0, InputSize::Normal, $application['technical']['skill1'], '', false, true, 'Technical Skill 1'),
            createInput('text', 'technical', 1, InputSize::Normal, $application['technical']['skill2'], '', false, true, 'Technical Skill 2'),
            createInput('text', 'technical', 2, InputSize::Normal, $application['technical']['skill3'], '', false, true, 'Technical Skill 3'),
            createInput('textarea', 'other-skills', 0, InputSize::Normal, $application['OtherSkills'], '', false, true, 'Other Skills'),
        '</div>',

        '<input type="hidden" name="eoi" value="' . htmlspecialchars($eoiNumber) . '">',
        '</form>'
    ?>

    <?php 
       echo '<div class="manage-control">';
        if ($prevEoi !== null) {
            echo createButton(ButtonSize::Normal, ButtonVariant::Plain, ButtonColor::Blue, './styles/images/left_line.svg', 'Previous', 'button', 'view-application.php?eoi=' . urlencode($prevEoi));
        } else {
            echo createButton(ButtonSize::Normal, ButtonVariant::Plain, ButtonColor::Blue, './styles/images/left_line.svg', 'Previous', 'button', '', false, true);
        }
        if ($nextEoi !== null) {
            echo createButton(ButtonSize::Normal, ButtonVariant::Plain, ButtonColor::Blue, './styles/images/right_line.svg', 'Next', 'button', 'view-application.php?eoi=' . urlencode($nextEoi), true);
        } else {
            echo createButton(ButtonSize::Normal, ButtonVariant::Plain, ButtonColor::Blue, './styles/images/right_line.svg', 'Next', 'button', '', true, true);
        }
        echo '</div>';
    ?>
</body>
</html>