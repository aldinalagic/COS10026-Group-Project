<?php 
    require_once 'icon.php';

    function createTab() {
        $website = createIcon('application.svg');
        $application = createIcon('application.svg');
        $database = createIcon('application.svg');
        return "<div class='tab'><a href='index.php'>$website</a> <a href='home.php'>$application</a> <a href='phpmyadmin'>$database</a></div>";
    }
?>