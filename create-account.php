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
        <img src="images/login-graphic.png" alt="login-graphic" id="login-graphic">
        <div id="login-form">
            <h3>Create Account</h3>
            <p>Register for a manager account</p>
            <form action="process-create-account.php" method="post">
                <div class='input small'><label for=email>Email:</label><input type='text' id='email' name='email' maxlength='100' class='Small' placeholder='Email' required></input></div>
                <br>
                <div class='input small'><label for=password>Password:</label><input type='password' id='password' name='password' maxlength='100' class='Small' placeholder='Password' required></input></div>
                <br>
                <div class='input small'><label for=text>First Name:</label><input type='firstname' id='firstname' name='firstname' maxlength='100' class='Small' placeholder='First Name' required></input></div>
                <br>
                <div class='input small'><label for=text>Last Name:</label><input type='lastname' id='lastname' name='lastname' maxlength='100' class='Small' placeholder='Last Name' required></input></div>
                <br>
                <?php echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Sign up', 'submit') ?>
            </form>
        </div>
    </div>
</body>
</html>