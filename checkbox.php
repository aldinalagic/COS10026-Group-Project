<?php
    function createCheckbox($id = '', $name = '', $value = '', $message) {
        return "<div class='checkbox-wrapper'>
                    <input id='$id' name='$name' type='checkbox' value='$value' />
                    <label class='cbx' for='$id'></label>
                    <label class='lbl' for='$id'>$message</label>
                </div>";
    }
?>