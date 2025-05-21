<?php
    $host = "localhost"; // 'localhost' because XAMPP runs the server locally
    $user = "root"; // 'root' is the default username for XAMPP's MySQL
    $pwd = ""; // default password is empty in XAMPP
    $sql_db = "glow_db"; 

    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>