<?php 
    // This enum defines the sizes of inputs that can be created.
    enum InputSize: string {
        case SMALL = 'small';
        case NORMAL = 'normal';
        case LARGE = 'large';
    }

    function createInput($type = 'text', $name = '', $maxLength = 0, $size = InputSize::NORMAL, $placeholder = 'Description', $pattern = '', $required = true, $disabled = false, $label = 'Label') {
        $sizeVaue = $size->value;
        
        $maxLength = $maxLength == 0 ? '' : "maxlength=$maxLength";
        $required = $required == true ? 'required' : '';
        $disabled = $disabled == false ? 'disabled' : '';
        $attributes = "type='$type' name='$name' $maxLength placeholder='$placeholder' pattern='$pattern' $required $disabled";
        
        return "<div class='input $sizeVaue'><label for=$name>$label</label><input $attributes></input></div>";
    }
?>