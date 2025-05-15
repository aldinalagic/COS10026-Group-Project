<?php
    require_once 'topbar.php'
?>

<!DOCTYPE html>
<html lang="en" id="about-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link rel="stylesheet" href = "styles/style.css">
</head>

<!--Any text that is circled has the ID circle-->
<!--Any text that is underlined has the ID underline-->
<!--Any text that is has grey text has the ID detail-->
<body>
        <?php
        echo createTopbar(
            TopbarVariant::SINGULAR, 
            array(
                new MenuOption('./styles/images/suitcase_fill.svg', IconSize::Normal, 'Jobs', 'jobs.php'),
                new MenuOption('./styles/images/folder_open_fill.svg', IconSize::Normal, 'Apply', 'apply.php'),
                new MenuOption('./styles/images/emoji_fill.svg', IconSize::Normal, 'About', 'about.php')
            ), 
            './styles/images/glow-logo.svg', 'About'
            )
    ?>

    <section id = "about-heading">
        <h1>Behind Glow</h1>
        <p>We bring beautifully simple infrastructure powering everything you build</p>
    </section>

    <section id = "team">
        <h1>The <span id = "underline">team</span></h1>

        <div id = "team-lists">
        <div id= "team-roles">
            <h2>Contributions</h2>
        <p>The following is a list of contributions made to this project</p>
            <ul>
                Aldin Alagic:
                <ul>Project designer</ul>
                <ul>Developer of jobs.html</ul>
            
            </ul>

            <ul>
                Fletcher Bishop:
                <ul>Developer of index.html</ul>
            </ul>

            <ul>
                Harry Clarke:
                <ul>Developer of About.html</ul>
            </ul>

            <ul>
                Nadine David
                <ul>Developer of apply.html</ul>
            </ul>
        </div>

        <!--details are to be greyed out as shown in design-->
        <div class = "team-details">
            <p>We are ABCD group, we are a small team that consists of four people</p>
            <p>Team Details:</p>
            <li>Class Time: <span class = "detail">Mon 2:30 - 4:30pm</span></li>
            <li>Aldin ID: <span class = "detail">105918373</span></li>
            <li>Fletcher ID: <span class = "detail">105764657</span></li>
            <li>Harry ID: <span class = "detail">105912375</span></li>
            <li>Nadine ID: <span class = "detail">105864793</span></li>
        


        <img src="images/group-photo.png" alt="group-image">
    </div>
</div>
    </section>

    <!--Table of group members-->
    <section id = "team-members">
        <table>
            <caption>The team</caption>
            <thead>
                <tr>
                    <th>Aladin Alagic</th>
                    <th>Fletcher Bishop</th>
                    <th>Harry Clarke</th>
                    <th>Nadine David</th>
                </tr>
            </thead>
            <tbody>
                <td>Interests
                    <ul>
                        <li>Programming</li>
                        <li>Martial Arts (Taekwondo)</li>
                    </ul>
                </td>
                <td>Interests
                    <ul>
                        <li>Piano</li>
                        <li>Game Development</li>
                    </ul>
                </td>
                <td>Interests
                    <ul>
                        <li>Programming</li>
                        <li>Basketball</li>
                    </ul>
                </td>
                <td>Interests
                <ul>
                    <li>Cats</li>
                    <li>Reading</li>
                </ul>
            </td>
            </tbody>
        </table>
    </section>


    <!--Sponsor section!-->
    <section id = "sponsor">
        <h1><span class = "circle">Sponsor </span> <span class = "detail">(Tutor)</span></h1>
        <div class id = "tutor">
              <img src = "images/nick-avatar.png" alt = "tutor-image">  <p>Nick</p>
        </div>

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
