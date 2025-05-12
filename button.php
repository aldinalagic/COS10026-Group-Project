<?php
    require_once 'icon.php';

    enum ButtonSize: string {
        case Small = 'small';
        case Normal = 'normal';
        case Large = 'large';
    }

    enum ButtonVarient: string {
        case Filled = 'filled';
        case Shaded = 'shaded';
        case Plain = 'plain';
        case Warning = 'warning';
        case Danger = 'danger';
        case Confirm = 'confirm';
    }

    enum ButtonColor: string {
        case Grey = 'grey';
        case Red = 'red';
        case Green = 'green';
        case Amber = 'amber';
        case Blue = 'blue';
        case Purple = 'purple';
        case Pink = 'pink';
        case Teal = 'teal';
        case Brown = 'brown';
        case Orange = 'orange';
    }
    

    function createButton($size = ButtonSize::Normal, $varient = ButtonVarient::Filled, $color = ButtonColor::Blue, $icon = '', $message = 'Button', $type = 'button') {
        $sizeValue = $size->value;
        $varientValue = $varient->value;
        $colourValue = $varient == ButtonVarient::Plain ? 'transparent' : $color->value;

        // Check to see if icon is empty, null, or has whitespace(s), if yes then don't display icon
        $displayIcon = ($icon == null || $icon == '' || ctype_space($icon)) ? null : createIcon($icon, getButtonIconSize($size));

        return "<button class='button $sizeValue $colourValue $varientValue' type='$type'>$displayIcon$message</button>";
    } 

    function getButtonIconSize($buttonSize) {
       return match($buttonSize) {
            ButtonSize::Small => IconSize::Small2,
            ButtonSize::Normal => IconSize::Small1,
            ButtonSize::Large => IconSize::Normal,
        };
    }
?>