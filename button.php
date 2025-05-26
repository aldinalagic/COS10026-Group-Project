<?php
    require_once 'icon.php';

    enum ButtonSize: string {
        case Small = 'small';
        case Normal = 'normal';
        case Large = 'large';
    }

    enum ButtonVariant: string {
        case Filled = 'filled';
        case Shaded = 'shaded';
        case Plain = 'plain';
        case Warning = 'warning';
        case Danger = 'danger';
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
    

    function createButton($size = ButtonSize::Normal, $variant = ButtonVariant::Filled, $color = ButtonColor::Blue, $icon = '', $message = 'Button', $type = 'button', $href = '', $iconRight = false, $disabled = false) {
        $sizeValue = $size->value;
        $variantValue = $variant->value;
        $colourValue = $variant == ButtonVariant::Plain ? 'transparent' : $color->value;

        $displayIcon = ($icon == null || $icon == '' || ctype_space($icon)) ? null : createIcon($icon, getButtonIconSize($size));
        $content = $iconRight ? "<span>$message</span>" . ($displayIcon ?? '') : ($displayIcon ?? '') . "<span>$message</span>";

        if($disabled) {
            return "<button class='button $sizeValue $colourValue $variantValue' type='$type' disabled><a draggable='false'>$content</a></button>";
        }

        return "<button class='button $sizeValue $colourValue $variantValue' type='$type'><a draggable='false' href='$href'>$content</a></button>";
    }
    function getButtonIconSize($buttonSize) {
       return match($buttonSize) {
            ButtonSize::Small => IconSize::Small2,
            ButtonSize::Normal => IconSize::Small1,
            ButtonSize::Large => IconSize::Normal,
        };
    }
?>