<?php
    enum ButtonSize: string {
        case SMALL = 'small';
        case NORMAL = 'normal';
        case LARGE = 'large';
    }

    enum ButtonVariety: string {
        case FILLED = 'filled';
        case SHADED = 'shaded';
        case PLAIN = 'plain';
        case WARNING = 'warning';
        case DANGER = 'danger';
    }

    enum Color: string {
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
    

    function createButton($size = ButtonSize::NORMAL, $variety = ButtonVariety::FILLED, $color = Color::Blue, $icon = '', $message = 'Button', $type = 'button') {
        $sizeValue = $size->value;
        $colourValue = $color->value;
        $varietyValue = $variety->value;

        // Check to see if icon is empty, null, or has whitespace(s), if yes then don't display icon
        $displayIcon = ($icon == null || $icon == '' || ctype_space($icon)) ? null : "<img src='$icon'>";

        return "<button class='button $sizeValue $colourValue $varietyValue' type='$type'>$displayIcon$message</button>";
    }
?>