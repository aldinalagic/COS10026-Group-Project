<?php
require_once 'button.php';
require_once 'input.php';
require_once 'settings.php';
session_start();

    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // sanitise input 
    function sanitize_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // form input
    $action = $_POST['action'] ?? null;
    $jobref = isset($_POST['jobref']) ? sanitize_input($_POST['jobref']) : '';
    $firstname = isset($_POST['firstname']) ? sanitize_input($_POST['firstname']) : '';
    $lastname = isset($_POST['lastname']) ? sanitize_input($_POST['lastname']) : '';
    $eoi_id = isset($_POST['eoi_id']) ? (int)$_POST['eoi_id'] : 0;
    $new_status = isset($_POST['new_status']) ? sanitize_input($_POST['new_status']) : '';
    
    if ($action) { 
        switch ($action) {
            case "view_all": //list all EOIS
                $query = "SELECT * FROM eoi";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                break;

            case "view_job": // list all EOIS for job ref
                if (!$jobref) { 
                    echo "<p>Enter job reference number.</p>"; 
                    exit; 
                }
                $query = "SELECT * FROM eoi WHERE JobReferenceNumber= ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "s", $jobref);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                break;

            case "view_name": // list all EOIS for applicant
                $query = "SELECT * FROM eoi WHERE 1=1";
                $params = [];
                $types = '';
                if ($firstname) {
                    $query .= " AND FirstName= ?";
                    $types .= 's';
                    $params[] = $firstname;
                }
                if ($lastname) {
                    $query .= " AND LastName= ?";
                    $types .= 's';
                    $params[] = $lastname;
                }
                $stmt = mysqli_prepare($conn, $query);
                if ($params) {
                    mysqli_stmt_bind_param($stmt, $types, ...$params);
                }
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                break;

            case "delete_job": // delete EOIS by job ref
                if (!$jobref) { 
                    echo "<p>Enter job reference.</p>"; 
                    exit; 
                }
                $query = "DELETE FROM eoi WHERE JobReferenceNumber = ?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, 's', $jobref);
                if (mysqli_stmt_execute($stmt)) { 
                    echo "<p>Deleted EOIs with job reference '" . htmlspecialchars($jobref) . "'.</p>";
                } else {
                    echo "<p>Error deleting: " . mysqli_error($conn) . "</p>";
                }
                exit;

            case "update_status": // change status for an EOI by ID
                if (!$eoi_id || !$new_status) { 
                    echo "<p>Enter EOI ID and status.<p>"; 
                exit; 
                }
                $query = "UPDATE eoi SET STATUS = ? WHERE EOInumber =?";
                $stmt = mysqli_prepare($conn, $query);
                mysqli_stmt_bind_param($stmt, "si", $new_status, $eoi_id);
                if (mysqli_stmt_execute($stmt)) {
                    echo "<p>Updated EOI #$eoi_id to '" . htmlspecialchars($new_status) . "'.</p>";
                } else {
                    echo "<p>Error updating: " . mysqli_error($conn) . "</p>";
                }
                exit;

            default;
                echo "<p>Invalid action.</p>";
                exit;
        }

        // display results after selecting
        if (isset($result) && $result && mysqli_num_rows($result) > 0) {
            echo "<table border ='1'>";
            echo "<tr>
                    <th>EOI Number</th>
                    <th>Job Reference</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                  </tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['EOInumber']}</td>
                    <td>{$row['JobReferenceNumber']}</td>
                    <td>{$row['FirstName']} {$row['LastName']}</td>
                    <td>{$row['EmailAddress']}</td>
                    <td>{$row['PhoneNumber']}</td>
                    <td>{$row['STATUS']}</td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results found.</p>";
        }
    } 
    
    // $eoiNumber = trim($_GET['eoi']); -> for single
    // viewing full application by eoi
    $eoiNumber = isset($_GET['eoi']) ? (int)$_GET['eoi'] : 0;
    $application = [];
    // Fetch the application details from the eoi table
    if ($eoiNumber) {
    $result = mysqli_query($conn, "SELECT * FROM eoi WHERE EOInumber = $eoiNumber");
    if ($result && $row = mysqli_fetch_assoc($result)) {
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
    <title>Manage EOIS</title>
    <link rel="stylesheet" href="/styles/style.css">
</head>

<body id="manage-body">
    <h2>Manage EOIs</h2>

    <form method="post" action="manage.php" class="manage-form">
        <label for="action">Select Action:</label>
        <select name="action" id="action">
            <option value="view_all">List All EOIs</option>
            <option value="view_job">List by Job Reference</option>
            <option value="view_name">List by Applicant Name</option>
            <option value="delete_job">Delete by Job Reference</option>
            <option value="update_status">Update EOI Status</option>
        </select>

        <label>Job Ref:</label>
            <input type="text" name="jobref">
        <label>First Name:</label>
            <input type="text" name="firstname">
        <label>Last Name:</label>
            <input type="text" name="lastname">
        <label>EOI ID:</label>
            <input type="text" name="eoi_id">
        <label>New Status:</label>
            <input type="text" name="new_status">

        <button type="submit">Go</button>
    </form>

    <?php
    /*
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
    */
?>
</body>
</html>