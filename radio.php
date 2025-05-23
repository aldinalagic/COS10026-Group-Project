<?php
    function createRadio($id = '', $name = '', $value = '', $message = '', $checked = false) {
        $isChecked = $checked ? 'checked' : '';
        return "<div class='radio-wrapper'>
                    <label class='radio-wrapper' for='$id'>
                        <input id='$id' type='radio' name='$name' value='$value', $isChecked required>
                        <span>$message</span>
                    </label>
                </div>";
    }
?>
