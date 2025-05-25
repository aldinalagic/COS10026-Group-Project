<?php
    require_once 'topbar.php';
    require_once 'footer.php';
?>

<!DOCTYPE html>
<html lang="en" id="about-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glow | About</title>
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
        <h3>The <span id = "underline">team</span></h3>

        <div id = "team-lists">
        <div id= "team-roles">
        <h5>Contributions</h5>
        <p>The following is a list of contributions made to this project</p>
            <ul>
                Aldin Alagic:
                <ul>Project designer</ul>
                <ul>Developer of jobs.php</ul>
                <ul>Developer of home.php</ul>
                <ul>Developed the component library</ul>
            </ul>

            <ul>
                Fletcher Bishop:
                <ul>Developer of index.php</ul>
                <ul>Developer of manage.php</ul>
                <ul>Developer of applications.php</ul>
                <ul>Developer of manager registration and login</ul>
            </ul>

            <ul>
                Harry Clarke:
                <ul>Developer of about.php</ul>
            </ul>

            <ul>
                Nadine David
                <ul>Developer of apply.php</ul>
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
        
        <img src="./styles/images/group-photo.png" alt="group-image">
    </div>
</div>
    </section>

    <!--Table of group members-->
    <section id = "team-members">
        <table>
            <caption>The team</caption>
            <thead>
                <tr>
                    <th>Aldin Alagic</th>
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
        <h5><span class = "circle">Sponsor </span> <span class = "detail">(Tutor)</span></h4>
        <div class id = "tutor">
              <img src = "./styles/images/nick.png" alt = "tutor-image">  <p>Nick</p>
        </div>

    </section>

    <?php
        echo createFooter();
    ?>

</body>
</html>
