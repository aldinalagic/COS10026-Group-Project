<?php 
    require_once 'avatar.php';
    require_once 'icon.php';

    // This class store information about a menu option.
    class MenuOption {
        private $variant = '';
        private $icon = '';
        private $text = '';
        private $href = '';

        // Init default variables on class creation.
        public function __construct($icon, $iconSize = IconSize::NORMAL, $text, $href) {
            $this->icon = createIcon($icon, $iconSize);
            $this->text = $text;
            $this->href = $href;
        }

        // Creates different type of menu options based off of the variant of the topbar.
        public function createMenuOption($variantValue) {
            $this->variant = $variantValue;
            return "<a class='menu-option $this->variant' href='$this->href'>$this->icon<span>$this->text</span></a>";
        }
    }

    // This file was necessary in order to 

    enum TopbarVariant: string {
        case SINGULAR = 'singular';
        case SEPERATED = 'seperated';
    }

    // Creates the topbar.
    function createTopbar($variant = TopbarVariant::SINGULAR, $menuOptions = array(
        new MenuOption('jobs.svg', IconSize::NORMAL, 'Jobs', 'jobs.php'),
        new MenuOption('apply.svg', IconSize::NORMAL, 'Apply', 'apply.php'),
        new MenuOption('about.svg', IconSize::NORMAL, 'About', 'about.php'),
    ), $logo = 'jobs.svg', $logoText = 'Glow') {
        $variantValue = $variant->value;
        $topbar = "<header class='topbar $variantValue'>";
        $menuOptionsContainer = createTopbarMenuOptions($variantValue, $menuOptions);
       
        // When a topbar is seperated, the width of the topbar will be 100%,
        // And what we do is create 2 more extra divs, one for the logo (left-side), and one for the avatar (right-side)
        if($variant == TopbarVariant::SEPERATED) {
            $topbar .= "<div class='topbar-container'><a href='index.php'><img src='$logo'></a></div>" . $menuOptionsContainer . "<div class='topbar-container'>" . createAvatar(AvatarSize::NORMAL, 'Name') . "</div>";
        } else {
            $topbar .= "<div class='logo-container'><a href='index.php'><img src='$logo'>$logoText</a></div>" . $menuOptionsContainer . createAvatar(AvatarSize::NORMAL, '');
        }

        return $topbar .= "</header>";
    }

    // Creates all the menu options within a container.
    function createTopbarMenuOptions($variantValue, $menuOptions) {
        $menuOptionsContainer = "<div class='topbar-container menu-options-container'>";

        for ($i = 0; $i < count($menuOptions); $i++) { 
            $menuOptionsContainer .= $menuOptions[$i]->createMenuOption($variantValue);
        }

        return $menuOptionsContainer .= "</div>";
    }
?>