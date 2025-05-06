<?php 
    include 'avatar.php';

    // This class store information about a menu option.
    class MenuOption {
        private $variant = '';
        private $icon = '';
        private $text = '';
        private $href = '';

        // Init default variables on class creation.
        public function __construct($icon, $text, $href) {
            $this->icon = $icon;
            $this->text = $text;
            $this->href = $href;
        }

        // Creates different type of menu options based off of the variant of the topbar.
        public function createMenuOption($variantValue) {
            $this->variant = $variantValue;
            return "<a class='menu-option $this->variant' href='$this->href'><img src='$this->icon' alt='icon'/><span>$this->text</span></a>";
        }
    }

    enum TopbarVariant: string {
        case SINGULAR = 'singular';
        case SEPERATED = 'seperated';
    }

    // Creates the topbar.
    function createTopbar($variant = TopbarVariant::SEPERATED, $menuOptions = array(
        new MenuOption('jobs.svg', 'Jobs', 'jobs.php'),
        new MenuOption('apply.svg', 'Apply', 'apply.php'),
        new MenuOption('about.svg', 'About', 'about.php'),
    ), $logo = 'jobs.svg', $logoText = '') {
        $variantValue = $variant->value;
        $topbar = "<header class='topbar $variantValue'>";
        $menuOptionsContainer = createTopbarMenuOptions($variantValue, $menuOptions);
       
        // When a topbar is seperated, the width of the topbar will be 100%,
        // And what we do is create 2 more extra divs, one for the logo (left-side), and one for the avatar (right-side)
        if($variant == TopbarVariant::SEPERATED) {
            $topbar .= "<div class='topbar-container'><a href='index.php'><img src='$logo'>$logoText</a></div>" . $menuOptionsContainer . "<div class='topbar-container'>" . createAvatar(AvatarSize::NORMAL, 'Name') . "</div>";
        } else {
            $topbar .= "<div class='topbar-container'><a href='index.php'><img src='$logo'>$logoText</a></div>" . $menuOptionsContainer . "<div class='topbar-container'>" . createAvatar(AvatarSize::NORMAL) . "</div>";
        }

        return $topbar .= "</header>";
    }

    // Creates all the menu options within a container.
    function createTopbarMenuOptions($variantValue, $menuOptions) {
        $menuOptionsContainer = "<div class='topbar-container'>";

        for ($i = 0; $i < count($menuOptions); $i++) { 
            $menuOptionsContainer .= $menuOptions[$i]->createMenuOption($variantValue);
        }

        return $menuOptionsContainer .= "</div>";
    }
?>