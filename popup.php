<?php
    require_once 'button.php';

    function createPopup($id, $title, $message, $button = '') {
        
        $backButton = createButton(ButtonSize::Normal, ButtonVariant::Shaded, ButtonColor::Grey, './styles/images/arrow-left.svg', 'Go back', 'button', '#');
        return "<div class='popup-wrapper' id='$id'><div class='popup-content-wrapper'><h5>$title</h5><p>$message</p><div class='popup-button-container'>$backButton$button</div></div></div>";
    }
?>