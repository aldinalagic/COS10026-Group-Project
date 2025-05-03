<?php

// This enum defines the sizes of avatars that can be created.
enum AvatarSize: string {
    case SMALL = 'small';
    case NORMAL = 'normal';
    case LARGE = 'large';
}


// This function creates an alert message with a specified type and message.
function createAvatar(AvatarSize $size = AvatarSize::NORMAL, $name = "Name", $menuOptions = array(
    "path/to/icon1" => "Option 1",
    "path/to/icon2" => "Option 2",
    "path/to/icon3"=> "Option 3"
)) {
    return "<div class='avatar-wrapper avatar-size-{$size->value}'><div class='avatar' id='avatar-{$size->value}'></div><p>$name</p></div>";
}

?>
