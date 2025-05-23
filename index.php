<?php 
    require_once 'checkbox.php'
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
        echo createCheckbox('languages', 'technical', 'langs', 'Progreamming lanuages')
    ?>

</body>
</html>