<?php
    require_once 'topbar.php';
    require_once 'icon.php';
    require_once 'button.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
            <h1>Cloud infrastructure <br>for everyone</h1>
            <p>Glow is for everyone. You, a startup, or an enterprise, Glow provides scalable cloud infrastructure that glows with you</p>
        
        <div id="welcome-actions">
            <?php echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Start now', 'button', 'jobs.php') ?>
            <?php echo createButton(ButtonSize::Normal, ButtonVariant::Plain, ButtonColor::Amber, '', 'Contact sales', 'button', 'mailto') ?>
        </div>
        </div>
        <img src="images/big-glow.svg" alt="Glow logo">

    </section>
    <section id="benefits">
        <div>
            <?php echo createIcon('./styles/images/repeat_fill.svg', IconSize::Normal) ?>
            <p class="benefithead">100%</p>
            <p class="benefittext">Uptime guarentee
            <br><span class="benefitsubtext">for all services</span></p>
        </div>
        <div>
            <?php echo createIcon('./styles/images/glow-eco.svg', IconSize::Normal) ?>
            <p class="benefithead">70%</p>
            <p class="benefittext">less carbon emissions
            <br><span class="benefitsubtext">than other cloud services</span></p>
        </div>
        <div>
            <?php echo createIcon('./styles/images/time_duration_fill.svg', IconSize::Normal) ?>
            <p class="benefithead">1 min</p>
            <p class="benefittext">Average time to
            <br><span class="benefitsubtext">get setup</span></p>
        </div>
    </section>
    <section id="discover">
        <h3>Discover <span class="glow-fancy-text">Glow</span></h3>
        <p>Join us, and leave your impact on the world.</p>
        <?php echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Careers', 'button', 'jobs.php') ?>
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
    <footer>
        <!-- Menu options (Jobs and about) -->
        <div id="footer-menu">
            <a href="jobs.html" class="menu-button">
                <button><img src="images/icons/jobs.svg" alt="Jobs icon">Jobs</button>
            </a>
            <a href="about.html" class="menu-button">
                <button><img src="images/icons/about.svg" alt="About icon">About</button>
            </a>
            <a href="apply.html" class="menu-button">
                <button><img src="images/icons/person-run.svg" alt="Apply icon">Apply</button>
            </a>
            <a href="https://github.com/aldinalagic/COS10026-Group-Project" class="menu-button" target="_blank">
                <button><img src="images/icons/github.png" alt="Github icon" id="github">Github</button>
            </a>
        </div>

        <a href="index.html" id="glow-logo-footer">
            <img src="images/glow-outlined-footer.svg" alt="">
        </a>

        <!-- Jira button to the jira board -->
        <a href="https://fletcher06.atlassian.net/jira/software/projects/CGAP1/summary" target="_blank">
            <button id="jira-button">Jira board<img src="images/icons/link-out.svg" alt="About icon"></button>
        </a>
        
    </footer>
</body>
</html>