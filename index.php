<?php 
    require_once 'topbar.php';
    require_once 'icon.php';
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
        echo createTopbar();
        echo createIcon('jobs.svg');
    ?>
</body>
</html>