<!DOCTYPE html>
<?php
    require_once 'button.php';
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
            
        $applications = [
            ['id' => 1, 'name' => 'App One', 'status' => 'Recently Added'],
            ['id' => 2, 'name' => 'App Two', 'status' => 'Accepted'],
            ['id' => 3, 'name' => 'App Three', 'status' => 'Pending Deletion'],
            ['id' => 4, 'name' => 'App Four', 'status' => 'Pending Deletion'],
            ['id' => 5, 'name' => 'App Five', 'status' => 'Accepted'],
            ['id' => 6, 'name' => 'App Six', 'status' => 'Recently Added'],
            ['id' => 7, 'name' => 'App Seven', 'status' => 'Accepted'],
            ['id' => 8, 'name' => 'App Eight', 'status' => 'Pending Deletion'],
            ['id' => 9, 'name' => 'App Nine', 'status' => 'Recently Added'],
            ['id' => 10, 'name' => 'App Ten', 'status' => 'Accepted'],
        ];
        foreach ($applications as $app) {
            echo "<div class='app-card'>",
                "<div id='appid'>" . "<p>{$app['id']}</p>" . "</div>",
                "<p id='appstatus'>{$app['status']}</p>",
                "<h6 id='appname'>{$app['name']}</h6>",
                "<div>" . createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Manage', 'button', 'jobs.php') . "</div>",
                "</div>";
        }
        echo "</div>";
    ?>
</body>
</html>