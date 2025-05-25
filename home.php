<?php
    require_once 'topbar.php';
    require_once 'button.php';
    require_once 'popup.php';
    require_once 'settings.php';

    ini_set('session.gc_maxlifetime', 10);
    session_start();
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > ini_get('session.gc_maxlifetime'))) {
        setcookie('PHPSESSID', '', time() - 3600, '/');
        header('Location: logout.php');
        exit();
    }

    if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {
        header('Location: 403-forbidden.php');
        exit();
    }

    $_SESSION['LAST_ACTIVITY'] = time();

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
        //echo createButton(variant: ButtonVariant::Danger, href: '#popup');
        //echo createPopup('#popup', 'Popup', 'This is a popup', createButton(variant: ButtonVariant::Danger, href: 'index.php'));
         echo createTopbar(
            TopbarVariant::SEPERATED, 
            array(
                new MenuOption('./styles/images/home_4_fill.svg', IconSize::Normal, 'Home', 'home.php', true),
                new MenuOption('./styles/images/folder_open_fill.svg', IconSize::Normal, 'Applications', 'applications.php'),
            ), 
            './styles/images/glow-logo.svg', 'Glow', "$FirstName $LastName"
        );
    ?>
    <div>
        <?php
            echo "<h1>👋 Welcome back " . $FirstName . "!</h1>";
        ?>
    </div>
</body>
</html>