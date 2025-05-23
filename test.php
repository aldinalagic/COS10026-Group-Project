<?php
    require_once 'radio.php'
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <?php
        echo createRadio('option1', 'example-radio', 'option1', 'Option 1');
        echo createRadio('option2', 'example-radio', 'option2', 'Option 2');
    ?>
</body>
</html>