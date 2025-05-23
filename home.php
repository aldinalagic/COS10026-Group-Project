<?php
    require_once 'topbar.php';
    require_once 'button.php';
    require_once 'popup.php';
    require_once 'settings.php';
    session_start();
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    // Get the first name from the database
    $email = $_SESSION['email'];
    $result = mysqli_query($conn, "SELECT FirstName FROM managers WHERE Email='$email'");
    $row = mysqli_fetch_assoc($result);
    $FirstName = $row ? $row['FirstName'] : '';
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
    <div>
    <?php
        //echo createButton(variant: ButtonVariant::Danger, href: '#popup');
        //echo createPopup('#popup', 'Popup', 'This is a popup', createButton(variant: ButtonVariant::Danger, href: 'index.php'));
         echo createTopbar(
            TopbarVariant::SEPERATED, 
            array(
                new MenuOption('./styles/images/suitcase_fill.svg', IconSize::Normal, 'Jobs', 'jobs.php'),
                new MenuOption('./styles/images/folder_open_fill.svg', IconSize::Normal, 'Apply', 'apply.php'),
                new MenuOption('./styles/images/emoji_fill.svg', IconSize::Normal, 'About', 'about.php')
            ), 
            './styles/images/glow-logo.svg', 'Glow'
        );
        echo createButton(variant: ButtonVariant::Danger, href: '#popup');
        echo createPopup('#popup', 'Popup', 'This is a popup', createButton(variant: ButtonVariant::Danger, href: 'index.php'));
        echo "<h1>👋 Welcome back " . $FirstName . "!</h1>";
    ?>
    </div>
</body>
</html>