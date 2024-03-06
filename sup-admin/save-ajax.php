<?php
include("../admin/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $city = $_POST["city"];

    if ($name != '' && $email != '' && $city != '0') {
        echo "Data received successfully: Name - $name, Email - $email, City - $city";
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request method.";
}
?>
