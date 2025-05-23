<!DOCTYPE html>
<?php
    require_once 'button.php';
    require_once 'badge.php';
    require_once 'settings.php';
    session_start();
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch all applications from the eoi table
    $applications = [];
    $result = mysqli_query($conn, "SELECT * FROM eoi");
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $applications[] = [
                'id' => $row['EOInumber'],
                'status' => $row['STATUS'],
                'name' => $row['FirstName'] . ' ' . $row['LastName'],
                // Add other fields as needed
            ];
        }
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="styles/applications.css">-->
    <link rel="stylesheet" href="styles/style.css">
    <title>Applications</title>
</head>
<body id="app-body">
    <?php
        // Include the header
        include 'manage-header.inc';
        echo "<div id='app-grid'>";
        foreach ($applications as $app) {
            echo "<div class='app-card'>",
                "<div id='appid'><p>{$app['id']}</p></div>",
                "<div id='appstatus'>" . createBadge(BadgeSize::Normal, '', BadgeColor::Green, $app['status']) . "</div>",
                "<h6 id='appname'>{$app['name']}</h6>",
                "<div>" . createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Manage', 'button', 'jobs.php') . "</div>",
                "</div>";
        }
        echo "</div>";
    ?>
</body>
</html>