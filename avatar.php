<?php
    require_once 'icon.php';

    // This enum defines the sizes of avatars that can be created.
    enum AvatarSize: string {
        case Small = 'small';
        case Normal = 'normal';
        case Large = 'large';
    }

    // This function creates an alert message with a specified type and message.
    function createAvatar($size = AvatarSize::Normal, $name = "Name", $hasPulldown = false) {
        if ($hasPulldown) {
            $logOut = createButton(ButtonSize::Small, ButtonVariant::Shaded, ButtonColor::Grey, '', 'Sign out', 'submit');
            $arrowIcon = createIcon('./styles/images/down_line.svg', IconSize::Normal);
            $checkboxId = 'avatar-toggle-' . uniqid();
            return "<input hidden type='checkbox' id='$checkboxId' name='avatar-toggle'><label for='$checkboxId' class='avatar-wrapper avatar-size-$size->value'><div class='avatar' id='avatar-$size->value'></div><p>$name</p>$arrowIcon</label><div class='avatar-pulldown-menu'><div class='avatar-wrapper avatar-size-$size->value pulldown'><div class='avatar' id='avatar-$size->value'></div><p>$name</p></div>$logOut</div>";
        }
        else {
            return "<div class='avatar-wrapper avatar-size-$size->value'><div class='avatar' id='avatar-$size->value'></div><p>$name</p></div>";
        }
    }
?>