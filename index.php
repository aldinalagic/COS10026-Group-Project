<?php
    require_once 'topbar.php';
    require_once 'icon.php';
    require_once 'button.php';
    require_once 'footer.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glow</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body id="body-index">
    <?php
        echo createTopbar(
            TopbarVariant::SINGULAR, 
            array(
                new MenuOption('./styles/images/suitcase_fill.svg', IconSize::Normal, 'Jobs', 'jobs.php'),
                new MenuOption('./styles/images/folder_open_fill.svg', IconSize::Normal, 'Apply', 'apply.php'),
                new MenuOption('./styles/images/emoji_fill.svg', IconSize::Normal, 'About', 'about.php')
            ), 
            './styles/images/glow-logo.svg', 'Glow'
        )
    ?>
    <section id="welcome">
        <div id="welcome-content">
            <h2>Cloud infrastructure for <br>everyone</h2>
            <h6>Glow is for everyone. You, a startup, or an enterprise, Glow provides scalable cloud infrastructure that glows with you</h6>
        
            <div id="welcome-actions">
                <?php echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Start now', 'button', 'jobs.php') ?>
                <?php echo createButton(ButtonSize::Normal, ButtonVariant::Plain, ButtonColor::Amber, '', 'Contact sales', 'button', 'mailto') ?>
            </div>

        </div>
    </section>

    <img id='welcome-img' src="./styles/images/glow-webapp-features.svg" alt="">
    <div id="glow-illustration-3-wrapper">
        <img id='glow-illustration-3' src="./styles/images/glow-illustration-3.svg" alt="">
    </div>

    <section id="discover">
        <h2>Discover <span class="glow-fancy-text">Glow</span></h2>
        <h6>Glow is more than cloud - we’re a team <br> on a mission and you can be a part of it 🚀</h6>
        <?php echo createButton(ButtonSize::Large, ButtonVariant::Filled, ButtonColor::Amber, '', 'Careers', 'button', 'jobs.php') ?>
    </section>
    
    <section id="explore">
        <h3>Explore</h3>
        <article>
            <img src="/images/about-effect.svg" alt="">
            <h4>Meet the people <br>behind Glow</h4>
            <p>Learn more about how Glow was made</p>
            <?php echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Explore', 'button', 'about.php') ?>
        </article>
    </section>
    <?php 
        echo createFooter();
    ?>
</body>
</html>