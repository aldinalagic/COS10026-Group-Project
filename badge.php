<?php
    require_once 'icon.php';

    // This enum defines the sizes of badges that can be created.
    enum BadgeSize: string {
        case Small = 'small';
        case Normal = 'normal';
        case Large = 'large';
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
    function createBadge($size = BadgeSize::Normal, $icon = 'path/to/icon', $color = BadgeColor::Green, $message = 'Badge message!') {
        $sizeValue = $size->value;
        $colourValue = $color->value;
        // Check to see if icon is empty, null, or has whitespace(s), if yes then don't display icon
        $displayIcon = ($icon == null || $icon == '' || ctype_space($icon)) ? null : getBadgeIconSize($size);

        return "<div class='badge $sizeValue $colourValue'>$displayIcon<p>$message</p></div>";
    }

    function getBadgeIconSize($badgeSize) {
       return match($badgeSize) {
            BadgeSize::Small => IconSize::Small4,
            BadgeSize::Normal => IconSize::Small3,
            BadgeSize::Large => IconSize::Small2,
        };
    }
?>
