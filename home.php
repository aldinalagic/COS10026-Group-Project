<?php
    require_once 'topbar.php';
    require_once 'button.php';
    require_once 'popup.php';
    require_once 'icon.php';
    require_once 'settings.php';

    session_start();
    if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
        header('Location: 403-forbidden.php');
        exit();
    }

    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    $email = $_SESSION['email'];
    $result = mysqli_query($conn, "SELECT FirstName, LastName FROM managers WHERE Email='$email'");
    $row = mysqli_fetch_assoc($result);
    $FirstName = $row ? $row['FirstName'] : '';
    $LastName = $row ? $row['LastName'] : '';
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="./styles/style.css">
        <style>
            .button {
                width: fit-content;
                height: fit-content;
            }
            </style>
</head>
<body id="home-body">
    <?php
         echo createTopbar(
            TopbarVariant::SEPERATED, 
            array(
                new MenuOption('./styles/images/home_4_fill.svg', IconSize::Normal, 'Home', 'home.php', true),
                new MenuOption('./styles/images/folder_open_fill.svg', IconSize::Normal, 'Manage', 'manage.php')
            ), 
            './styles/images/glow-logo.svg', 'Glow', "$FirstName $LastName"
        );
    ?>
    <div class="submenu">
        <?php
            echo "<h5>👋 Welcome back " . $FirstName . "!</h5>";
        ?>
    </div>
</body>
</html>