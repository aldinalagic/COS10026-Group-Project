<?php
    enum AlertType {
        case SUCCESS = "success";
        case INFO = "info";
        case WARNING = "warning";
        case DANGER = "danger";
    }

    function createAlert($message = "Alert message!", $type = AlertType::SUCCESS) {
        return "<div class='alert' id='alert-$type'>$message</div>";
    }
?>