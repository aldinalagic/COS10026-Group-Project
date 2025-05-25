<?php
    require_once 'button.php';
    require_once 'input.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Glow | Manager Login</title>
</head>
<body id="login-body">
    <header>
        <div>
            <img src="styles/images/glow-logo.svg" alt="Glow Logo">
            <h6>For Managers</h6>
        </div>
        <?php
            echo createButton(ButtonSize::Normal, ButtonVariant::Shaded, ButtonColor::Amber, '', 'Create Account', 'button', 'create-account.php');
        ?>
    </header>
    <div id=login-content>
        <img src="./styles/images/login-graphic.svg" alt="login-graphic" id="login-graphic">
        <div id="login-form">
            <h4>Manager login</h4>
            <p>Login as a manager</p>
            <form action="process-login.php" method="post">
                <?php echo createInput('email', 'email', 100, InputSize::Normal, 'email@example.com', '', true, false, 'Email', '') ?>
                <?php echo createInput('password', 'password', 100, InputSize::Normal, 'Enter password', '', true, false, 'Password', '') ?>
                <?php echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Sign in', 'submit') ?>
            </form>
        </div>
    </div>
</body>
</html>