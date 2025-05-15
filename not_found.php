<?php 
    require_once 'icon.php';
    require_once 'badge.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body class="error-body">
    <div class="logo-error">
        <?php
        echo createIcon('./styles/images/glow-logo.svg');
        ?>
        Whoops
    </div>

    <div class="error-contents">
        <?php
            echo createBadge(BadgeSize::Large, '', BadgeColor::Red, 'Something went wrong...')
        ?>
        <h3>
            We can’t find what you <br> are looking for 🤔
        </h3>
    </div>

    <img draggable="false" class="error-img" src="./styles/images/not_found.svg" alt="">
</body>
</html>