<?php
    enum ButtonSize: string {
        case SMALL = 'small';
        case NORMAL = 'normal';
        case LARGE = 'large';
    }

    enum ButtonVarient: string {
        case FILLED = 'filled';
        case SHADED = 'shaded';
        case PLAIN = 'plain';
        case WARNING = 'warning';
        case DANGER = 'danger';
        case CONFIRM = 'confirm';
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
    

    function createButton($size = ButtonSize::NORMAL, $varient = ButtonVarient::FILLED, $color = ButtonColor::Blue, $icon = '', $message = 'Button', $type = 'button') {
        $sizeValue = $size->value;
        $varientValue = $varient->value;
        $colourValue = $varient == ButtonVarient::PLAIN ? 'transparent' : $color->value;

        // Check to see if icon is empty, null, or has whitespace(s), if yes then don't display icon
        $displayIcon = ($icon == null || $icon == '' || ctype_space($icon)) ? null : "<img src='$icon'>";

        return "<button class='button $sizeValue $colourValue $varientValue' type='$type'>$displayIcon$message</button>";
    } 
?>