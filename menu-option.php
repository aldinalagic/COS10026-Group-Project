<?php
    require_once 'icon.php';

    class MenuOption {
        private $variant = '';
        private $icon = '';
        private $text = '';
        private $href = '';
        private $isChecked = false; // Default to false

        public function __construct($icon, $iconSize = IconSize::Normal, $text, $href, $isChecked = false) {
            $this->icon = createIcon($icon, $iconSize);
            $this->text = $text;
            $this->href = $href;
            $this->isChecked = $isChecked;
        }

        public function createMenuOption($variantValue) {
            $this->variant = $variantValue;

            $checked = $this->isChecked ? ' checked' : '';

            return "<a class='menu-option $this->variant $checked' href='$this->href'>$this->icon<span>$this->text</span></a>";
        }
    }

    function createMenuOptionsContainer($class, $variantValue, $menuOptions) {
        $menuOptionsContainer = "<div class='$class menu-options-container'>";

        for ($i = 0; $i < count($menuOptions); $i++) { 
            $menuOptionsContainer .= $menuOptions[$i]->createMenuOption($variantValue);
        }

        return $menuOptionsContainer .= "</div>";
    }
?>