<?php 
    require_once 'avatar.php';
    require_once 'icon.php';
    require_once 'menu-option.php';


    enum TopbarVariant: string {
        case SINGULAR = 'singular';
        case SEPERATED = 'seperated';
    }

    // Creates the topbar.
    function createTopbar($variant = TopbarVariant::SINGULAR, $menuOptions = array(
        new MenuOption('jobs.svg', IconSize::Normal, 'Jobs', 'jobs.php'),
        new MenuOption('apply.svg', IconSize::Normal, 'Apply', 'apply.php', true),
        new MenuOption('about.svg', IconSize::Normal, 'About', 'about.php'),
    ), $logo = 'jobs.svg', $logoText = 'Glow') {
        $variantValue = $variant->value;
        $topbar = "<header class='topbar $variantValue'>";
        $menuOptionsContainer = createMenuOptionsContainer('topbar-container', $variantValue, $menuOptions);
        
        // When a topbar is seperated, the width of the topbar will be 100%,
        // And what we do is create 2 more extra divs, one for the logo (left-side), and one for the avatar (right-side)
        if($variant == TopbarVariant::SEPERATED) {
            $topbar .= "<div class='topbar-container'><a href='index.php'><img src='$logo'></a></div>" . $menuOptionsContainer . "<div class='topbar-container'>" . createAvatar(AvatarSize::Normal, 'Name', true) . "</div>";
        } else {
            # YOU HAVE TO DO THIS BECAUSE PHP IS A TRASH LANGUAGE. I am actually losing brain cells writing php.
            # For some reason you cant create a class then call a function RIGHT after the class is created. For example: new MenuOption(...)->createMenuOption(...) This does not work for some reason :/
            $contactMenuOption = new MenuOption('I dont know why, but if I leave this as an empty string it does not work, so I decided to add this text here :)', IconSize::Normal, 'Contact us', 'mailto:contact@glow.com.au');
            $contactMenuOption = $contactMenuOption->createMenuOption('singular');
            $topbar .= "<div class='logo-container'><a href='index.php'><img src='$logo'>$logoText</a></div>" . $menuOptionsContainer . $contactMenuOption;
        }

        return $topbar .= "</header>";
    }
?>