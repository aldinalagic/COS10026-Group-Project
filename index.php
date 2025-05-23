<?php 
    require_once 'button.php';
    require_once 'popup.php';
    require_once 'tab.php';
    require_once 'avatar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>


<body>
    <?php   
        echo createAvatar(AvatarSize::Normal, '{fullName}', true)
    ?>

</body>
</html>