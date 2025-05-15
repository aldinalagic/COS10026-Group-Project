<?php
    require_once 'topbar.php'
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
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <!-- <div class="glow-loader">
        <div></div>
        <img src="images/icons/glow-footer.svg">
    </div> -->

    <!-- The entire navigation bar is contained in the header element -->
    <?php
        echo createTopbar(
            TopbarVariant::SINGULAR, 
            array(
                new MenuOption('person-')
        ))
    ?>
    <section id="welcome">
        <div id="welcome-contents">
            <h1>Cloud infrastructure <br>for everyone</h1>
            <p>Glow is for everyone. You, a startup, or an enterprise, Glow provides scalable cloud infrastructure that glows with you</p>
        
        <div id="welcome-actions">
            <a href="jobs.html" class="button-primary">Start now</a>
            <a href="" id="contact">Contact us</a>
        </div>
        </div>
        <img src="images/big-glow.svg" alt="Glow logo">

    </section>
    <section id="benefits">
        <div>
            <img src="images/icons/repeatarrows.svg" alt="cycle">
            <p class="benefithead">100%</p>
            <p class="benefittext">Uptime guarentee
            <br><span class="benefitsubtext">for all services</span></p>
        </div>
        <div>
            <img src="images/icons/greenglow.svg" alt="green glow">
            <p class="benefithead">70%</p>
            <p class="benefittext">less carbon emissions
            <br><span class="benefitsubtext">than other cloud services</span></p>
        </div>
        <div>
            <img src="images/icons/clock.svg" alt="clock">
            <p class="benefithead">1 min</p>
            <p class="benefittext">Average time to
            <br><span class="benefitsubtext">get setup</span></p>
        </div>
    </section>
    <section id="discover">
        <h3>Discover <span class="glow-fancy-text">Glow</span></h3>
        <p>Join us, and leave your impact on the world.</p>
        <a href="jobs.html" class="button-primary"><p>Careers</p></a>
    </section>
    <section id="explore">
        <h3>Explore</h3>
        <article>
            <img src="/images/about-effect.svg" alt="">
            <h4>Meet the people <br>behind Glow</h4>
            <p>Learn more about how Glow was made</p>
            <a href="about.html" class="button-primary">Explore</a>
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