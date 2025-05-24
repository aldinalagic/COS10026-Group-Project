<?php 
    enum InputSize: string {
        case Small = 'small';
        case Normal = 'normal';
        case Large = 'large';
    }

    function createInput($type = 'text', $name = '', $maxLength = 0, $size = InputSize::Normal, $placeholder = 'Description', $pattern = '', $required = true, $disabled = false, $label = 'Label', $value = '') {
        $sizeValue = $size->value;

        $maxLengthAttr = $maxLength == 0 ? '' : "maxlength='$maxLength'";
        $requiredAttr = $required ? 'required' : '';
        $disabledAttr = $disabled ? 'disabled' : '';
        $patternAttr = (ctype_space($pattern) || strlen($pattern) == 0) ? '' : "pattern='$pattern'";
        $placeholderAttr = "placeholder='$placeholder'";

        if ($type == 'textarea') {
            return "<div class='textarea $sizeValue'><label for='$name'>$label</label><textarea id='$name' name='$name' $maxLengthAttr $placeholderAttr $requiredAttr $disabledAttr>$value</textarea></div>";
        }

        return "<div class='input $sizeValue'><label for='$name'>$label</label><input type='$type' name='$name' value='$value' $maxLengthAttr $placeholderAttr $patternAttr $requiredAttr $disabledAttr /></div>";
    }
?>
