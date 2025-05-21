<?php
    require_once 'topbar.php';
    require_once 'button.php';
    require_once 'icon.php';

    // When the job description is retrived from the database this function gets called,
    // which is used to split up and categorise the job description into various sections.
    // This function returns an associative array (key-value pair) where the key is the heading,
    // and the value is the text that beongs to that heading.
    function processDescription() {
        $description = [];
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glow | Careers</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body id="jobs-body">
    <!-- This section is the default content of the jobs page -->

    <!-- This section appears when the user clicks on a job -->
    <section id="overview-page">
            <div class="topbar-go-back"><?php echo createButton(ButtonSize::Normal, ButtonVariant::Shaded, ButtonColor::Grey, './styles/images/left_line.svg', 'Go back', 'button') ?></div>
            <div id="overview-header-wrapper">

                <!-- Make sure the img does not go outside where it shouldn't (that's why there is a wrapper here) -->
                <div id="job-background-wrapper">
                    <img src="./styles/images/network-administrator-backround.svg">
                </div>

                <?php
                    echo createIcon('./styles/images/sparkles_2_fill.svg', IconSize::Large)
                ?>
            </div>

            <div id="overview-topbar">
                <h5>Network Administrator</h5> <!-- TO BE REPLACED WITH ACTUAL DB DATA -->
                <div>
                    <p>NET01</p> <!-- TO BE REPLACED WITH ACTUAL DB DATA -->
                    <?php echo createButton(ButtonSize::Normal, ButtonVariant::Filled, ButtonColor::Amber, '', 'Apply', 'button', 'apply.php'); ?> <!-- TO BE REPLACED WITH ACTUAL DB DATA -->
                </div>
            </div>
            
            <div id="overview-contents-wrapper">
                <div>
                    <div class="overview-icon-header">
                        <?php echo createIcon('./styles/images/eye_fill.svg', IconSize::Large); ?> 
                        <h5>Overview</h5>
                    </div>

                    <p>A Network Administrator is responsible for managing Glow’s computer networks, including local area networks (LANs), wide area networks (WANs), intranets, and internet systems. They ensure that network infrastructure is robust and operates without disruption.</p> <!-- TO BE REPLACED WITH ACTUAL DB DATA -->
                </div>

                <div>
                    <div class="overview-icon-header">
                        <?php echo createIcon('./styles/images/sparkles_2_fill.svg', IconSize::Large); ?> 
                        <h5>Salary and Benefits</h5>
                    </div>

                    <p>$231K - $340K annually, with the possibility of additional equity-based incentives.</p> <!-- TO BE REPLACED WITH ACTUAL DB DATA -->
                </div>

                <div>
                    <div class="overview-icon-header">
                        <?php echo createIcon('./styles/images/inbox_2_fill.svg', IconSize::Large); ?> 
                        <h5>Reporting Structure</h5>
                    </div>

                    <p>The Network Administrator will report to the IT Manager.</p> <!-- TO BE REPLACED WITH ACTUAL DB DATA -->
                </div>

                <div>
                    <div class="overview-icon-header">
                        <?php echo createIcon('./styles/images/task_2_fill.svg', IconSize::Large); ?> 
                        <h5>Responsibilities</h5>
                    </div>

                    <!-- TO BE REPLACED WITH ACTUAL DB DATA -->
                    <ul> 
                        <li>Maintain and monitor LANs, WANs, and intranet systems.</li>
                        <li>Apply security measures including firewall rules, patches, and encryption protocols.</li>
                        <li>Upgrade systems and network infrastructure as needed.</li>
                        <li>Provide end-user technical support and network troubleshooting.</li>
                        <li>Implement and manage backup and disaster recovery plans.</li>
                        <li>Document network policies, architecture, and configurations.</li>
                    </ul>
                </div>

                <div>
                    <div class="overview-icon-header">
                        <?php echo createIcon('./styles/images/check_circle_fill.svg', IconSize::Large); ?> 
                        <h5>Responsibilities</h5>
                    </div>

                    <!-- TO BE REPLACED WITH ACTUAL DB DATA -->
                    <ol>
                        <li>Bachelor’s degree in IT, Computer Science, or related field.</li>
                        <li>CCNA or CompTIA Network+ certification.</li>
                        <li>Strong command of networking protocols (TCP/IP, DNS, DHCP).</li>
                        <li>Experience with AWS, Azure, or Google Cloud networking services.</li>
                        <li>Excellent problem-solving and analytical skills.</li>
                    </ol>
                </div>

                <div id="overview-bottom">
                    <div>
                        <h4>We are waiting for you 😎</h4>
                        <?php echo createButton(ButtonSize::Large, ButtonVariant::Filled, ButtonColor::Amber, '', 'Appply now', 'button', 'apply.php')?>
                    </div>
                    <div>
                        <img src="./styles/images/glow-illustration-4.svg" alt="">
                    </div>
            </div>
    </section>
</body>
</html>