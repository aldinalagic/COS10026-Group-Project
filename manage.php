<!DOCTYPE html>
<?php
    require_once 'button.php';
    require_once 'badge.php';
    require_once 'settings.php';
    require_once 'topbar.php';
    session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: 403-forbidden.php');
        exit();
    }

    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $searchString = '';
    // Fetch all applications from the eoi table
    $applications = [];
    $result = mysqli_query($conn, "SELECT * FROM eoi");
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $applications[] = [
                'id' => $row['EOInumber'],
                'status' => $row['STATUS'],
                'name' => $row['FirstName'] . ' ' . $row['LastName'],
                'jobReferenceNumber' => $row['JobReferenceNumber'],
            ];
        }
    }

    $email = $_SESSION['email'];
    $avatarNameResult = mysqli_query($conn, "SELECT FirstName, LastName FROM managers WHERE Email='$email'");
    $row = mysqli_fetch_assoc($avatarNameResult);
    $FirstName = $row ? $row['FirstName'] : '';
    $LastName = $row ? $row['LastName'] : '';

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="styles/applications.css">-->
    <link rel="stylesheet" href="styles/style.css">
    <title>Manage</title>
</head>
<body id="app-body">
    

    <?php
        
        echo createTopbar(
            TopbarVariant::SEPERATED, 
            array(
                new MenuOption('./styles/images/home_4_fill.svg', IconSize::Normal, 'Home', 'home.php'),
                new MenuOption('./styles/images/folder_open_fill.svg', IconSize::Normal, 'Manage', 'manage.php', true),
            ), 
            './styles/images/glow-logo.svg', 'Glow', "$FirstName $LastName"
        );
    ?>
    <!--<div id="app-search">
    <form method="get" action="">
        <br>
        <img src="/images/icons/searchicon.svg" alt="search" id="search-icon">
        <input 
            type="text" 
            name="search" 
            placeholder="Search" 
            size="16"
            value="<?php //echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
        >
    </form>
    </div>-->
    <div id="manage-apps">
        <?php
            echo '<form method="get" action="" class="manage-form">';
            echo '<h5>Manage</h5>';
            echo '<div class="manage-apps-header">';
            echo    '<img src="styles/images/actions.svg" alt="actions" id="actions-icon">';
            echo    '<h6>Actions</h6>';
            echo    createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, "styles/images/execute.svg", "Execute", "submit");
            echo '</div>';
            echo '<p class="manage-apps-subtext">Actions allow you to filter and sort applications.</p>';
            echo '<div id="manage-apps-sorting">';

            echo    '<div id="action-inputs">';
            echo        '<label for="action">Manage Action</label>';
            echo        '<select name="action" id="action">';
            $options = [
                'view_all' => 'List All EOIs',
                'view_job' => 'List by Job Reference',
                'view_name' => 'List by Applicant Name',
                'delete_job' => 'Delete by Job Reference',
                'update_status' => 'Update EOI Status'
            ];
            $currentAction = isset($_GET['action']) ? $_GET['action'] : '';
            foreach ($options as $value => $label) {
                $selected = ($currentAction === $value) ? 'selected' : '';
                echo "<option value=\"$value\" $selected>$label</option>";
            }
            echo        '</select>';
            echo    '</div>';

            echo    '<div id="jobref-input">';
            echo        '<label for="jobref">Job Reference Number</label>';
            echo        '<input type="text" name="jobref" id="jobref" placeholder="Enter number here" value="' . (isset($_GET['jobref']) ? htmlspecialchars($_GET['jobref']) : '') . '">';
            echo    '</div>';

            echo    '<div id="firstname-input">';
            echo        '<label for="firstname">Find by first name</label>';
            echo        '<input type="text" name="firstname" id="firstname" placeholder="Enter first name" value="' . (isset($_GET['firstname']) ? htmlspecialchars($_GET['firstname']) : '') . '">';
            echo    '</div>';

            echo    '<div id="lastname-input">';
            echo        '<label for="lastname">Find by last name</label>';
            echo        '<input type="text" name="lastname" id="lastname" placeholder="Enter last name" value="' . (isset($_GET['lastname']) ? htmlspecialchars($_GET['lastname']) : '') . '">';
            echo    '</div>';

            echo    '<div id="eoi-id-input">';
            echo        '<label for="eoi_id">Applicant ID</label>';
            echo        '<input type="text" name="eoi_id" id="eoi_id" placeholder="Enter ID here" value="' . (isset($_GET['eoi_id']) ? htmlspecialchars($_GET['eoi_id']) : '') . '">';
            echo    '</div>';

            echo    '<div id="new-status-input">';
            echo        '<label for="status">Status</label>';
            echo        '<select name="status" id="status">';
            $statusOptions = [
                'Recently Added' => 'Recently Added',
                'In Progress' => 'In Progress',
                'Pending Deletion' => 'Pending Deletion',
                'Accepted' => 'Accepted'
            ];
            $currentStatus = isset($_GET['status']) ? $_GET['status'] : '';
            foreach ($statusOptions as $value => $label) {
                $selected = ($currentStatus === $value) ? 'selected' : '';
                echo "<option value=\"$value\" $selected>$label</option>";
            }
            echo        '</select>';
            echo    '</div>';

            echo '</div>';
            echo '</form>';
            ?>
        <div class="manage-apps-header">
            <img src="styles/images/folder.svg" alt="applications">
            <h5>Applications</h5>
        </div>
        <p class="manage-apps-subtext">List of all applications.</p>
    <?php
    // Get the search string if submitted
// ... (your code above)

$action = isset($_GET['action']) ? $_GET['action'] : '';
$jobref = isset($_GET['jobref']) ? trim($_GET['jobref']) : '';
$firstname = isset($_GET['firstname']) ? trim($_GET['firstname']) : '';
$lastname = isset($_GET['lastname']) ? trim($_GET['lastname']) : '';
$eoi_id = isset($_GET['eoi_id']) ? trim($_GET['eoi_id']) : '';
$new_status = isset($_GET['status']) ? $_GET['status'] : '';

switch ($action) {
    case 'view_job':
        // Filter by job reference (EOI number)
        $filteredApps = [];
        if ($jobref !== '') {
            foreach ($applications as $app) {
                if (stripos($app['jobReferenceNumber'], $jobref) !== false) {
                    $filteredApps[] = $app;
                }
            }
        }
        break;
    case 'view_name':
        // Filter by first or last name (case-insensitive)
        $filteredApps = [];
        foreach ($applications as $app) {
            $name = strtolower($app['name']);
            $first = strtolower($firstname);
            $last = strtolower($lastname);
            if (
                ($first && strpos($name, $first) !== false) ||
                ($last && strpos($name, $last) !== false)
            ) {
                $filteredApps[] = $app;
            }
        }
        break;
    case 'view_all':
        // Show all, sorted by EOI number (id) ascending
        $filteredApps = $applications;
        usort($filteredApps, function($a, $b) {
            return strcmp($a['id'], $b['id']);
        });
        break;
    case 'delete_job':
        if ($jobref !== '') {
        $query = "DELETE FROM eoi WHERE JobReferenceNumber = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $jobref);
        $stmt->execute();
        $stmt->close();
        // Refresh the applications array after deletion
        $result = mysqli_query($conn, "SELECT * FROM eoi");
        $applications = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $applications[] = [
                    'id' => $row['EOInumber'],
                    'status' => $row['STATUS'],
                    'name' => $row['FirstName'] . ' ' . $row['LastName'],
                    'jobReferenceNumber' => $row['JobReferenceNumber'],
                ];
            }
        }
    }
    $filteredApps = $applications;
    break;
    case 'update_status':
    if ($eoi_id !== '' && $new_status !== '') {
        $query = "UPDATE eoi SET STATUS = ? WHERE EOInumber = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $new_status, $eoi_id);
        $stmt->execute();
        $stmt->close();
        // Refresh the applications array after update
        $result = mysqli_query($conn, "SELECT * FROM eoi");
        $applications = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $applications[] = [
                    'id' => $row['EOInumber'],
                    'status' => $row['STATUS'],
                    'name' => $row['FirstName'] . ' ' . $row['LastName'],
                    'jobReferenceNumber' => $row['JobReferenceNumber'],
                ];
            }
        }
    }
    $filteredApps = $applications;
    break;
    // Show all applications after update (or you can show a message)
    $filteredApps = $applications;
        break;
    default:
        // Default: show all, sorted by EOI number
        $filteredApps = $applications;
        usort($filteredApps, function($a, $b) {
            return strcmp($a['id'], $b['id']);
        });
        break;
}

echo "<div id='app-grid'>";
foreach ($filteredApps as $app) {
    $BadgeColor = BadgeColor::Green;
    if ($app['status'] == 'Recently Added') {
        $BadgeColor = BadgeColor::Green;
    }
    else if ($app['status'] == 'In Progress') {
        $BadgeColor = BadgeColor::Amber;
    }
    else if ($app['status'] == 'Pending Deletion') {
        $BadgeColor = BadgeColor::Red;
    }
    else if ($app['status'] == 'Accepted') {
        $BadgeColor = BadgeColor::Blue;
    }
    echo "<div class='app-card'>",
        "<div id='appid'><p>{$app['id']}</p></div>",
        "<div id='appstatus'>" . createBadge(BadgeSize::Large, '', $BadgeColor, $app['status']) . "</div>",
        "<h5 id='appname'>{$app['name']}</h5>",
        "<p id='appjobref'>{$app['jobReferenceNumber']}</p>",
        "<form method='get' action='view-application.php'>",
            "<input type='hidden' name='eoi' value='{$app['id']}'>",
            createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'View', 'submit'),
        "</form>",
    "</div>";
}
echo "</div>";
?>
    </div>
</body>
</html>