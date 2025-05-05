<?php 
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

        // Creates different type of menu options based off of the variant of the topbar 
        public function createMenuOption($variantValue) {
            $this->variant = $variantValue;
            return "<a class='menu-option $this->variant' href='$this->href'><img src='$this->icon' alt='icon'/><span>$this->text</span></a>";
        }
    }

    enum TopbarVariant: string {
        case SINGULAR = 'singular';
        case SEPERATED = 'seperated';
    }

    function createTopbar($variant = TopbarVariant::SINGULAR, $menuOptions = array(
        new MenuOption('jobs.svg', '', 'jobs.php'),
        new MenuOption('apply.svg', 'Apply', 'apply.php'),
        new MenuOption('about.svg', 'About', 'about.php'),
    )) {
        $variantValue = $variant->value;
    
        $topbar = "<header class='topbar $variantValue'>";
        
        for ($i = 0; $i < count($menuOptions); $i++) { 
            $topbar .= $menuOptions[$i]->createMenuOption($variantValue);
        }

        $topbar .= "</header>";
        return $topbar;
    }
?>