<?php
    function createSwipeControl() {
        return "<form id='swipe' action='sss.php'><div class='swipe-control-wrapper'><input type='range' min=0 max=10 value=0 step=0.01 class='swipe-control'><label for='swipe-control'>Swipe to accept</label><input type='submit' value='' onmouseover='document.getElementById('swipe').submit();'></div></form>";
    }
?>

