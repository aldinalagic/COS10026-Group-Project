<?php
// This enum defines the sizes of badges that can be created.
enum BadgeSize: string {
    case SMALL = 'small';
    case NORMAL = 'normal';
    case LARGE = 'large';
}

enum BadgeColor: string {
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


// This function creates a badge with a specified size, icon, color, and message.
function createBadge($size = BadgeSize::NORMAL, $icon = 'path/to/icon', $color = BadgeColor::Green, $message = 'Badge message!') {
    $sizeValue = $size->value;
    $colourValue = $color->value;
    
    // Check to see if icon is empty, null, or has whitespace(s), if yes then don't display icon
    $displayIcon = ($icon == null || $icon == '' || ctype_space($icon)) ? null : "<img src='$icon'>";

    return "<div class='badge $sizeValue $colourValue'>$displayIcon<p>$message</p></div>";
}

?>
