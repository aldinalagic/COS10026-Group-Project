<?php 
    include 'alert.php'
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
    <h1>ssss</h1>
    <?php echo createAlert("Application Pending Deletion", AlertType::DANGER) ?>
</body>
</html>
