<?php
    require_once 'topbar.php';
    require_once 'button.php';
    require_once 'popup.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/style.css">
    <style>
        .button {
            width: fit-content;
            height: fit-content`;
        }
    </style>
</head>
<body>
    <?php
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
    ?>

</body>
</html>