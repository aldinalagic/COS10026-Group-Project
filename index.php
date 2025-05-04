<?php 
    include 'button.php';
    include 'badge.php';
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
    <h1>Header</h1>
    <?php 
        echo createButton(ButtonSize::NORMAL, ButtonVariety::CONFIRM, ButtonColor::Blue, '', 'Hold to accept');
        echo createBadge(BadgeSize::NORMAL, '    ', BadgeColor::Green,'Badge');
    ?>
</body>
</html>
`