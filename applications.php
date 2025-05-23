<!DOCTYPE html>
<?php
    require_once 'button.php';
    require_once 'badge.php';
    require_once 'settings.php';
    require_once 'topbar.php';
    session_start();
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
        
        echo createTopbar(
            TopbarVariant::SEPERATED, 
            array(
                new MenuOption('./styles/images/suitcase_fill.svg', IconSize::Normal, 'Jobs', 'jobs.php'),
                new MenuOption('./styles/images/folder_open_fill.svg', IconSize::Normal, 'Apply', 'apply.php'),
                new MenuOption('./styles/images/emoji_fill.svg', IconSize::Normal, 'About', 'about.php')
            ), 
            './styles/images/glow-logo.svg', 'Glow'
        );
    ?>
    <div id="app-search">
    <form method="get" action="">
        <br>
        <input 
            type="text" 
            name="search" 
            placeholder="Search applications..." 
            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
        >
        <button type="submit">Search</button>
    </form>
    </div>
    <?php
    // Get the search string if submitted
    $searchString = isset($_GET['search']) ? trim($_GET['search']) : '';
    // You can now use $searchString to filter your applications if needed
        echo "<div id='app-grid'>";
        foreach ($applications as $app) {
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
            if ($app['name'] == $searchString || $searchString == '') {
                echo "<div class='app-card'>",
                "<div id='appid'><p>{$app['id']}</p></div>",
                "<div id='appstatus'>" . createBadge(BadgeSize::Normal, '', $BadgeColor, $app['status']) . "</div>",
                "<h6 id='appname'>{$app['name']}</h6>",
                "<div>" . createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Manage', 'button', 'manage.php') . "</div>",
                "</div>";
            }
        }
        echo "</div>";
    ?>
</body>
</html>