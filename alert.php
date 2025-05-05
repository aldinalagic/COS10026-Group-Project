<?php
    // Unfortunately for some reason we cannot delete alert element from the page when it animates out! PHP is really annoying sometimes.


    // This enum defines the varients of alerts that can be created.
    enum AlertVarient: string {
        case SUCCESS = 'success';
        case INFO = 'info';
        case WARNING = 'warning';
        case DANGER = 'danger';
    }


    // This function creates an alert message with a specified varient and message.
    function createAlert($message = "Alert message!", $varient = AlertVarient::SUCCESS) {
        return "<div class='alert' id='alert-$varient->value'>$message</div>";
    }

?>
