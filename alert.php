<?php
// Unfortunately for some weird


// This enum defines the types of alerts that can be created.
enum AlertType: string {
    case SUCCESS = 'success';
    case INFO = 'info';
    case WARNING = 'warning';
    case DANGER = 'danger';
}


// This function creates an alert message with a specified type and message.
function createAlert(string $message = "Alert message!", AlertType $type = AlertType::SUCCESS) {
    
    
    return "<div class='alert' id='alert-{$type->value}'>$message</div>";
}

?>
