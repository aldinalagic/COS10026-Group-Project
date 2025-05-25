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
    <title>Applications</title>
</head>
<body id="app-body">
    

    <?php
        
        echo createTopbar(
            TopbarVariant::SEPERATED, 
            array(
                new MenuOption('./styles/images/home_4_fill.svg', IconSize::Normal, 'Home', 'home.php'),
                new MenuOption('./styles/images/folder_open_fill.svg', IconSize::Normal, 'Applications', 'applications.php', true),
            ), 
            './styles/images/glow-logo.svg', 'Glow', "$FirstName $LastName"
        );
    ?>
    <div id="app-search">
    <form method="get" action="">
        <br>
        <img src="/images/icons/searchicon.svg" alt="search" id="search-icon">
        <input 
            type="text" 
            name="search" 
            placeholder="Search" 
            size="16"
            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
        >
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
            if (stripos($app['name'], $searchString) !== false || $searchString == '') {
                echo "<div class='app-card'>",
                    "<div id='appid'><p>{$app['id']}</p></div>",
                    "<div id='appstatus'>" . createBadge(BadgeSize::Large, '', $BadgeColor, $app['status']) . "</div>",
                    "<h5 id='appname'>{$app['name']}</h5>",
                    // Button as a form to redirect with EOI ID
                    "<form method='get' action='manage.php'>",
                        "<input type='hidden' name='eoi' value='{$app['id']}'>",
                        createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Manage', 'submit'),
                    "</form>",
                "</div>";
            }
        }
        echo "</div>";
    ?>
</body>
</html>