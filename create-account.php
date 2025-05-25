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
            echo createButton(ButtonSize::Normal, ButtonVariant::Shaded, ButtonColor::Amber, '', 'Login', 'button', 'login.php');
        ?>
    </header>
    <div id="login-content">
        <img src="./styles/images/login-graphic.svg" alt="login-graphic" id="login-graphic">
        <div id="login-form">
            <h4>Create Account</h4>
            <p>Register for a manager account</p>
            <form action="process-create-account.php" method="post">
              <?php
                    echo createInput('text', 'email', 100, InputSize::Normal, 'Email', '', true, false, 'Email');
                    echo createInput('password', 'password', 100, InputSize::Normal, 'Password', '', true, false, 'Password');
                    echo createInput('text', 'firstname', 100, InputSize::Normal, 'First Name', '', true, false, 'First Name');
                    echo createInput('text', 'lastname', 100, InputSize::Normal, 'Last Name', '', true, false, 'Last Name');
                    echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Sign up', 'submit')
                ?>
            </form>
        </div>
    </div>
</body>
</html>