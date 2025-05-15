<?php 
    http_response_code(403);

    require_once 'button.php';
    require_once 'popup.php';
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
        echo createButton(ButtonSize::Normal, ButtonVariant::Danger, ButtonColor::Pink, '', "Delete", 'button', '#popup');
        echo createPopup('popup', '🔥 Delete Application?', 'Are you sure you want to delete {fullName}’s application? <br> We cant bring it back to life if you decide to delete it!', createButton(ButtonSize::Normal, ButtonVariant::Danger, ButtonColor::Pink, '', "Delete", 'button', 'index.php'));
   
   ?>
</body>
</html>