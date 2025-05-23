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
    <title>Login</title>
</head>
<body id="login-body">
    <img src="images/login-graphic.png" alt="login-graphic" id="login-graphic">
    <div id="login-form">
        <h3>Manager login</h3>
        <p>Login as a manager</p>
        <form action="process-login.php" method="post">
            <div class='input small'><label for=email>Email:</label><input type='text' id='email' name='email' maxlength='100' class='Small' placeholder='Email' required></input></div>
            <br>
            <div class='input small'><label for=password>Password:</label><input type='password' id='password' name='password' maxlength='100' class='Small' placeholder='Password' required></input></div>
            <br>
            <?php echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Sign in', 'submit') ?>
        </form>
    </div>
</body>
</html>