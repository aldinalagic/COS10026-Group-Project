<?php
// This enum defines the sizes of badges that can be created.
enum BadgeSize: string {
    case SMALL = 'small';
    case NORMAL = 'normal';
    case LARGE = 'large';
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


// This function creates a badge with a specified size, icon, color, and message.
function createBadge($size = BadgeSize::NORMAL, $icon = 'path/to/icon', $color = Color::Green, $message = 'Badge message!') {
    
    // Variables are required to be able to use them in the style attribute???
    $colourValue = $color->value;

    // Check to see if icon is empty, null, or has whitespace(s), if yes then don't display icon
    $displayIcon = ($icon == null || $icon == '' || ctype_space($icon)) ? null : "<img src='$icon'>";

    return "<div class='badge' id='badge-$size->value' style='background-color: var(--color-$colourValue-100); color: var(--color-$colourValue-500)'>$displayIcon<p>$message</p></div>";
}

?>
